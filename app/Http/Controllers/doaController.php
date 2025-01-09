<?php

namespace App\Http\Controllers;

use App\Models\Doa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class doaController extends Controller
{
    public function doaIndex(Request $request)
{
    // Ambil parameter pencarian dari request
    $search = $request->input('search');

    // Query data doa berdasarkan pencarian nama_doa
    $doa = Doa::when($search, function ($query, $search) {
        return $query->where('nama_doa', 'like', "%{$search}%");
    })
    ->latest()
            ->paginate(20)
            ->withQueryString();

    // Return view dengan data doa dan pencarian
    return view('admin.viewPage.landingpage.doa.doa', [
        'doa' => $doa,
        'search' => $search,
    ]);
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

            $filePath = $file->storeAs('doas', $fileName, 'public');

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
                // dd($doa->path, Storage::disk('public')->exists('/'.$doa->path));
                if (Storage::disk('public')->exists($doa->path)) {
                    // dd($doa->path);
                    Storage::disk('public')->delete($doa->path);
                }
            }

            $file = $request->file('foto');

            $fileName = $foto. '-' . Carbon::now()->timestamp . '.' . $file->getClientOriginalExtension();

            $filePath = $file->storeAs('doas', $fileName, 'public');

            $input['path'] = $filePath;

        }
        
        try {
            $doa->update($input);
            
            return redirect()->route('admin.doa')->with('success', 'Data Doa Berhasil Diubah!');
        } catch (\Throwable $th) { 
             return redirect()->route('admin.doa')->with('error', 'Data Doa Gagal Diubah!');
         
        }
        
    }
    public function deleteDoa($id){
        $doa = Doa::find($id);
        $doa->delete();
        return redirect()->route('admin.doa')->with('success', 'Data Doa Berhasil Dihapus!');
    }

}
