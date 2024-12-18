<?php

namespace App\Http\Controllers;

use App\Models\Doa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class doaController extends Controller
{
    public function doaIndex(){
        $doa = Doa::get();
        return view('admin.viewPage.landingpage.doa.doa', ['doa'=>$doa]);
    }
    public function addDoa(){
        return view('admin.viewPage.landingpage.doa.addDoa');
    }
    public function storeDoa(Request $request){
        $input = $request->validate([
            'nama_doa' => 'required',
            'deskripsi_doa' => 'required',
            'ayat_renungan'=> 'required',
            'isi_renungan' => 'required',
            'ayat_tambahan'=> 'string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $foto = str_replace([' ', '.'], '-', $input['nama_doa']);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');

            $fileName = $foto . '-' . Carbon::now()->timestamp . '.' . $file->getClientOriginalExtension();

            $filePath = $file->storeAs('romos', $fileName, 'public');

            $input['path'] = $filePath;
        }

        Doa::create($input);
        return redirect()->route('admin.doa')->with('success', 'Data Doa Berhasil Ditambahkan!');

    }
    public function updateDoa($id){
        $doa = Doa::find($id);
        return view('admin.viewPage.landingpage.doa.updateDoa', ['doa'=>$doa]);
    }
    public function updatedDoa(Request $request, $id){
        $doa = Doa::find($id);
        $input = $request->validate([
            'nama_doa' => 'required',
            'deskripsi_doa' => 'required',
            'ayat_renungan'=> 'required',
            'isi_renungan' => 'required',
            'ayat_tambahan'=> 'string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $foto= str_replace([' ', '.'], '-', $input['nama_doa']);

        $doa = Doa::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($doa->path) {
                Storage::disk('public')->delete($doa->path);
            }

            $file = $request->file('foto');

            $fileName = $foto. '-' . Carbon::now()->timestamp . '.' . $file->getClientOriginalExtension();

            $filePath = $file->storeAs('doas', $fileName, 'public');

            $input['path'] = $filePath;
        }

        try {
        $doa->update($input);
        } catch (\Throwable $th) {
         //throw $th;  
             return redirect()->route('admin.doa')->with('error', 'Data Doa Gagal Diubah!');
         
        }
        
    }
    public function deleteDoa($id){
        $doa = Doa::find($id);
        $doa->delete();
        return redirect()->route('admin.doa')->with('success', 'Data Doa Berhasil Dihapus!');
    }

}
