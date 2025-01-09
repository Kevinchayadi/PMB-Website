<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class kegiatanController extends Controller
{
    public function kegiatanIndex(){
        $kegiatan = Kegiatan::latest()
        ->paginate(20)
        ->withQueryString();;
        return view('admin.viewPage.landingpage.kegiatan.kegiatan', compact('kegiatan'));
    }
    public function addKegiatan(){
        return view('admin.viewPage.landingpage.kegiatan.addKegiatan');
    }
    public function storeKegiatan(Request $request){
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
            'foto' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $foto = str_replace([' ', '.'], '-', $validated['title']);
        if ($request->hasFile('foto')) {
            
            $file = $request->file('foto');

            $fileName = $foto . '-' . $file->getClientOriginalExtension();

            $filePath = $file->storeAs('article', $fileName, 'public');

            $validated['path'] = $filePath;
        }

        Kegiatan::create($validated);
        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan created successfully.');
    }
    public function updateKegiatan($id){
        $kegiatan = Kegiatan::find($id);
        return view('admin.viewPage.landingpage.kegiatan.updateKegiatan', compact('kegiatan'));
    }
    public function updatedKegiatan(Request $request,$id){
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
            'foto' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // dd($validated);
        $kegiatan = Kegiatan::find($id);
        $foto = str_replace([' ', '.'], '-', $validated['title']);
        if ($request->hasFile('foto')) {
            if ($kegiatan->path) {
                Storage::disk('public')->delete($kegiatan->path);
            }
            $file = $request->file('foto');

            $fileName = $foto . '-' . $file->getClientOriginalExtension();

            $filePath = $file->storeAs('article', $fileName, 'public');

            $validated['path'] = $filePath;
        }
        $kegiatan->update($validated);
        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan updated successfully.');
    }
    public function deleteKegiatan($id){
        $kegiatan = Kegiatan::find($id);
        $kegiatan->delete();

        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan deleted successfully.');
    }

}
