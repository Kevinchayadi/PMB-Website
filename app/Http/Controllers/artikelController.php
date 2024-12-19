<?php

namespace App\Http\Controllers;

use App\Models\Articel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class artikelController extends Controller
{
    public function artikelIndex()
    {
        $artikel = Articel::get();
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
            'foto' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',             
            'additionalLink' => 'nullable|url',             
        ]);
        // $artikel = Articel::find($id);
        $foto = str_replace([' ', '.'], '-', $input['title']);
        if ($request->hasFile('foto')) {
            // if ($artikel->path) {
            //     Storage::disk('public')->delete($artikel->path);
            // }
            $file = $request->file('foto');

            $fileName = $foto . '-' . $file->getClientOriginalExtension();

            $filePath = $file->storeAs('article', $fileName, 'public');

            $input['path'] = $filePath;
        }
        
        
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
        // dd($request->all());
        $input = $request->validate([
            'title' => 'required|string|max:255',           
            'body' => 'required|string|min:10',
            'foto' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',             
            'additionalLink' => 'nullable|url',             
        ]);
        $artikel = Articel::find($id);
        $foto = str_replace([' ', '.'], '-', $input['title']);
        if ($request->hasFile('foto')) {
            if ($artikel->path) {
                Storage::disk('public')->delete($artikel->path);
            }
            $file = $request->file('foto');

            $fileName = $foto . '-' . $file->getClientOriginalExtension();

            $filePath = $file->storeAs('article', $fileName, 'public');

            $input['path'] = $filePath;
        }
        
        $artikel->update($input);
        return redirect()->route('admin.artikel')->with('success', 'Artikel berhasil diupdate!!');
        
    }
    public function deleteArtikel($id)
    {
        $artikel = Articel::find($id);
        $artikel->delete();
        return redirect()->route('admin.artikel')->with('success', 'Artikel berhasil dihapus!!');
    }
}
