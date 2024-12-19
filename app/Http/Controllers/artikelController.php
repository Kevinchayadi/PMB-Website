<?php

namespace App\Http\Controllers;

use App\Models\Articel;
use Illuminate\Http\Request;

class artikelController extends Controller
{
    public function artikelIndex()
    {
        Articel::get();
        return view('admin.viewPage.landingpage.artikel.artikel', compact('artikel'));
    }
    public function addArtikel()
    {
        return view('admin.viewPage.landingpage.artikel.addArtikel');
    }
    public function storeArtikel(Request $request)
    {
        $input = $request->validate([
            'title' => 'required|string|max:255',           
            'body' => 'required|string|min:10',             
            'additionalLink' => 'nullable|url',             
        ]);
        
        Articel::create($input);
        return redirect()->route('admin.artikel')->with('success', 'Artikel berhasil ditambahkan');
    }
    public function updateArtikel($id)
    {
        $artikel = Articel::find($id);
        return view('admin.viewPage.landingpage.artikel.updateArtikel', compact('artikel'));
    }
    public function updatedArtikel(Request $request, $id)
    {
        $input = $request->validate([
            'title' => 'required|string|max:255',           
            'body' => 'required|string|min:10',             
            'additionalLink' => 'nullable|url',             
        ]);
        $artikel = Articel::find($id);
        $artikel->update([
            'title' => $input['title'],
            'body' => $input['body'],
            'additionalLink' => $input['additionalLink'],
        ]);
        return redirect()->route('admin.artikel')->with('success', 'Artikel berhasil diupdate!!');
        
    }
    public function deleteArtikel($id)
    {
        $artikel = Articel::find($id);
        $artikel->delete();
        return redirect()->route('admin.artikel')->with('success', 'Artikel berhasil dihapus!!');
    }
}
