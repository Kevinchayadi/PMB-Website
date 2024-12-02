<?php

namespace App\Http\Controllers;

use App\Models\Romo;
use Illuminate\Http\Request;

class pastorController extends Controller
{
    public function pastorIndex(){
        $pastor = Romo::get();
        return view('admin.viewPage.landingpage.pastor.Pastor',compact('pastor'));
    }
    public function addPastor(){
        return view('admin.viewPage.landingpage.pastor.addPastor');
    }
    public function storePastor(Request $request){
        $input = $request->validate([
            'nama_romo' => 'required|string|max:255',       
            'ttl_romo' => 'nullable|string',                 
            'nomorhp_romo' => 'nullable|digits:10',          
        ]);
    
        
        Romo::create($input);
    
        return redirect()->route('admin.pastor')->with('success', 'Romo berhasil dibuat!');
    }
    public function updatePastor($id){
        $pastor = Romo::find($id);
        return view('admin.viewPage.landingpage.pastor.updatePastor');
    }
    public function updatedPastor(Request $request, $id){
        $input = $request->validate([
            'nama_romo' => 'required|string|max:255',       
            'ttl_romo' => 'nullable|string',                 
            'nomorhp_romo' => 'nullable|digits:10',          
        ]);
        $pastor = Romo::find($id);
        $pastor->update($input);
    
        return redirect()->route('admin.pastor')->with('success', 'Romo berhasil dibuat!');
    }
    public function deletePastor($id){
        $pastor = Romo::find($id);
        $pastor->delete();
        return redirect()->route('admin.pastor')->with('success', 'Romo berhasil dihapus!');
    }

}
