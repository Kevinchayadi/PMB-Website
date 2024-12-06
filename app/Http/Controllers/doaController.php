<?php

namespace App\Http\Controllers;

use App\Models\Doa;
use Illuminate\Http\Request;

class doaController extends Controller
{
    public function doaIndex(){
        $doa = Doa::get();
        return view('admin.viewPage.landingpage.doa.doa');
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
            'ayat_tambahan'=> 'string'
        ]);
        Doa::create($input);
        return redirect()->route('admin.doa')->with('success', 'Data Doa Berhasil Ditambahkan!');

    }
    public function updateDoa($id){
        $doa = Doa::find($id);
        return view('admin.viewPage.landingpage.doa.updateDoa');
    }
    public function updatedDoa(Request $request, $id){
        $doa = Doa::find($id);
        $request->validate([
            'nama_doa' => 'required',
            'deskripsi_doa' => 'required',
            'ayat_renungan'=> 'required',
            'isi_renungan' => 'required',
            'ayat_tambahan'=> 'string'
        ]);
        try {
         $doa->update([
             'nama_doa' => $request->nama_doa,
             'deskripsi_doa' => $request->deskripsi_doa,
             'ayat_renungan'=> $request->ayat_renungan,
             'isi_renungan' => $request->isi_renungan,
             'ayat_tambahan'=> $request->ayat_tambahan,
         ]);
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
