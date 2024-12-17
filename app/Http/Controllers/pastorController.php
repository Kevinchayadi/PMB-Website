<?php

namespace App\Http\Controllers;

use App\Models\Romo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class pastorController extends Controller
{
    public function pastorIndex()
    {
        $pastor = Romo::get();
        return view('admin.viewPage.landingpage.pastor.Pastor', compact('pastor'));
    }
    public function addPastor()
    {
        return view('admin.viewPage.landingpage.pastor.addPastor');
    }

    public function storePastor(Request $request)
    {
        $input = $request->validate([
            'nama_romo' => 'required|string|max:255',
            'DOB_romo' => 'nullable|date',
            'tempat_lahir' => 'nullable|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'pengalaman' => 'nullable|string',
            'nomorhp_romo' => 'nullable|digits:10',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $foto = str_replace([' ', '.'], '-', $input['nama_romo']);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');

            $fileName = $foto . '-' . Carbon::now()->timestamp . '.' . $file->getClientOriginalExtension();

            $filePath = $file->storeAs('romos', $fileName, 'public');

            $input['path'] = $filePath;
        }
        Romo::create($input);

        return redirect()->route('admin.pastor')->with('success', 'Romo berhasil dibuat!');
    }

    public function updatePastor($id)
    {
        $pastor = Romo::find($id);
        return view('admin.viewPage.landingpage.pastor.updatePastor', compact('pastor'));
    }
    public function updatedPastor(Request $request, $id)
    {
        $input = $request->validate([
            'nama_romo' => 'required|string|max:255',
            'DOB_romo' => 'nullable|date',
            'tempat_lahir' => 'nullable|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'pengalaman' => 'nullable|string',
            'nomorhp_romo' => 'nullable|digits:10',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $foto= str_replace([' ', '.'], '-', $input['nama_romo']);

        $romo = Romo::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($romo->path) {
                Storage::disk('public')->delete($romo->path);
            }

            $file = $request->file('foto');

            $fileName = $foto. '-' . Carbon::now()->timestamp . '.' . $file->getClientOriginalExtension();

            $filePath = $file->storeAs('romos', $fileName, 'public');

            $input['path'] = $filePath;
        }

        $romo->update($input);

        return redirect()->route('admin.pastor')->with('success', 'Romo berhasil diperbarui!');
    }

    public function deletePastor($id)
    {
        $pastor = Romo::find($id);
        $pastor->delete();
        return redirect()->route('admin.pastor')->with('success', 'Romo berhasil dihapus!');
    }
}
