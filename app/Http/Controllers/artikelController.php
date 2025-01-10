<?php

namespace App\Http\Controllers;

use App\Models\Articel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class artikelController extends Controller
{
    public function artikelIndex(Request $request)
    {
        // Ambil parameter pencarian dari request
        $search = $request->input('search');
    
        // Query data artikel berdasarkan pencarian title
        $artikel = Articel::when($search, function ($query, $search) {
            return $query->where('title', 'like', "%{$search}%");
        })
        ->latest()
            ->paginate(20)
            ->withQueryString();
    
        // Return view dengan data artikel dan pencarian
        return view('admin.viewPage.landingpage.artikel.artikel', compact('artikel', 'search'));
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
        ], [
            'title.required' => 'Kolom Judul harus diisi.',
            'title.max' => 'Judul tidak boleh lebih dari :max karakter.',
            'body.required' => 'Kolom Isi harus diisi.',
            'body.min' => 'Isi harus memiliki minimal :min karakter.',
            'foto.file' => 'Field foto harus berupa file.',
            'foto.mimes' => 'File foto harus dalam format: jpeg, png, jpg, gif, svg.',
            'foto.max' => 'Ukuran file foto tidak boleh lebih dari :max kilobyte.',
            'additionalLink.url' => 'Link tambahan harus berupa URL yang valid.',
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
        return redirect()->route('admin.artikel')->with('success', 'Artikel berhasil ditambahkan!');
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
        ], [
            'title.required' => 'Kolom Judul harus diisi.',
            'title.max' => 'Judul tidak boleh lebih dari :max karakter.',
            'body.required' => 'Kolom Isi harus diisi.',
            'body.min' => 'Isi harus memiliki minimal :min karakter.',
            'foto.file' => 'Field foto harus berupa file.',
            'foto.mimes' => 'File foto harus dalam format: jpeg, png, jpg, gif, svg.',
            'foto.max' => 'Ukuran file foto tidak boleh lebih dari :max kilobyte.',
            'additionalLink.url' => 'Link tambahan harus berupa URL yang valid.',
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
        return redirect()->route('admin.artikel')->with('success', 'Artikel berhasil diperbarui!');
        
    }
    public function deleteArtikel($id)
    {
        $artikel = Articel::find($id);
        $artikel->delete();
        return redirect()->route('admin.artikel')->with('success', 'Artikel berhasil dihapus!');
    }
}
