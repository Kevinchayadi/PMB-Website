<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Acara;
use Illuminate\Http\Request;
use App\Models\Documentation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AcaraController extends Controller
{
    public function acaraIndex()
    {
        $acara = Acara::with('documentations')->get(); 
        return view('dashboard.acara.index', ['acara'=> $acara]);
    }

    
    public function addAcara()
    {
        return view('dashboard.acara.add');
    }

    
    public function storeAcara(Request $request)
    {
        $request->validate([
            'nama_acara' => 'required',
            'deskripsi_acara' => 'required',
            'tipe_acara' => 'required',
            'dokumentasi' => 'required|array|min:1|max:3',
            'dokumentasi.*' => 'nullable|image|max:2048' 
        ]);


        try {
            DB::beginTransaction();
            $acara = Acara::create([
                'nama_acara' => $request->nama_acara,
                'tipe_acara' => $request->tipe_acara,
                'deskripsi_acara' => $request->deskripsi_acara,
            ]);
    
            if($request->hasFile('dokumentation')){
                $curr = 1;
                foreach($request->file('dokumentation') as $file){
                    $extension = $file->getClientOriginalExtension();
                    $namefile = $request->nama_acara . '_' . $curr . '.' . $extension;
                    $file->storeAs('dokumentasi', $namefile);
                    $curr++;
    
                   $acara->documentations()->create(
                    ['nama_dokumentasi' => $namefile]
                      
                   );
                }
            }

            DB::commit();

            
        } catch (\Throwable $th) {
            DB::rollBack();

            Log::error('Gagal menyimpan acara: ' . $th->getMessage());
            return back()->with('error', 'ADD Acara Failed!');
        }

        return redirect()->route('admin.acara')->with('success', 'Acara dan dokumentasi berhasil ditambahkan');
    }

    
    public function updateAcara($slug)
    {
        $acara = Acara::with('dokumentasi')->where('nama_acara', $slug)->firstOrFail();
        return view('dashboard.acara.edit', compact('acara'));
    }

    
    public function updatedAcara(Request $request, $slug)
    {
        $acara = Acara::with('documentations')->where('nama_acara', $slug)->firstOrFail();

        $request->validate([
            'nama_acara' => 'required',
            'deskripsi_acara' => 'required',
            'tipe_acara' => 'required',
            'dokumentasi' => 'required|array|min:1|max:3',
            'dokumentasi.*' => 'nullable|image|max:2048',
        ]);
        
        try {
            DB::beginTransaction();

            $acara->update([
                'nama_acara' => $request->nama_acara,
                'tipe_acara' => $request->tipe_acara,
                'deskripsi_acara' => $request->deskripsi_acara,
            ]);
    
            if($request->has('dokumentation')) {
                foreach ($acara->dokumentstions as $oldDokumentasi) {
                    Storage::delete('dokumentasi/' . $oldDokumentasi->nama_dokumentasi);
                    $oldDokumentasi->delete();
                }
                
                $curr = 1;
                foreach($request->file('dokumentation') as $file){
                    $extension = $file->getClientOriginalExtention();
                    $namefile = $request->nama_acara . '_' . $curr . '.' . $extension;
                    $file->storeAs('dokumentasi', $namefile);
                    $curr++;
    
                    $acara->documentations()->create(
                        ['nama_dokumentasi' => $namefile]
                    );
                }

            }

            DB::commit();

        } catch (\Throwable $th) {
            DB::rollBack();

            Log::error('Gagal melakukan update acara: '. $th->getMessage());
            return back()->with('error', 'gagal melakukan update!');


        }

        return redirect()->route('admin.acara')->with('success', 'Acara dan dokumentasi berhasil diperbarui');
    }

    
    public function deleteAcara($slug)
    {
        $acara = Acara::with('dokumentations')->where('nama_acara', $slug)->firstOrFail();
        
       
        foreach ($acara->dokumentations as $dokumentasi) {
            Storage::delete('dokumentasi/' . $dokumentasi->nama_dokumentasi);
            $dokumentasi->delete();
            
        }

       
        $acara->delete();

        return redirect()->route('dashboard.acara')->with('success', 'Acara dan dokumentasi berhasil dihapus');
    }
}
