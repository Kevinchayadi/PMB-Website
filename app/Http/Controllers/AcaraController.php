<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Dokumentasi;
use Illuminate\Http\Request;

class AcaraController extends Controller
{
    public function acaraIndex()
    {
        $acara = Acara::with('dokumentasi')->get(); // Load acara dengan dokumentasi
        return view('admin.acara.index', ['acara'=> $acara]);
    }

    // Menampilkan form untuk menambahkan acara baru
    public function addAcara()
    {
        return view('admin.acara.add');
    }

    // Menyimpan acara baru dan dokumentasi
    public function storeAcara(Request $request)
    {
        $request->validate([
            'nama_acara' => 'required',
            'deskripsi_acara' => 'required',
            'dokumentasi.*' => 'nullable|image|max:2048' // Validasi dokumentasi sebagai gambar
        ]);

        // Menyimpan acara
        $acara = Acara::create([
            'nama_acara' => $request->nama_acara,
            'deskripsi_acara' => $request->deskripsi_acara,
        ]);

        // Menyimpan dokumentasi
        if($request->has('dokumentasi')) {
            $count = 0;
            foreach ($request->file('dokumentasi') as $file) {
                $fileName = $request->nama_acara . $count . $file->getClientOriginalName();
                $file->move(public_path('images/acara'), $fileName);
                $count++;
                Dokumentasi::create([
                    'nama_dokumentasi' => $fileName,
                    'id_acara' => $acara->id,
                ]);
            }
        }

        return redirect()->route('admin.acara')->with('success', 'Acara dan dokumentasi berhasil ditambahkan');
    }

    // Menampilkan form edit untuk acara dan dokumentasi
    public function updateAcara($slug)
    {
        $acara = Acara::with('dokumentasi')->where('nama_acara', $slug)->firstOrFail();
        return view('admin.acara.edit', compact('acara'));
    }

    // Memperbarui acara dan dokumentasi
    public function updatedAcara(Request $request, $slug)
    {
        $acara = Acara::where('nama_acara', $slug)->firstOrFail();

        $request->validate([
            'nama_acara' => 'required',
            'deskripsi_acara' => 'required',
            'dokumentasi.*' => 'nullable|image|max:2048' // Validasi dokumentasi sebagai gambar
        ]);

        // Update data acara
        $acara->update([
            'nama_acara' => $request->nama_acara,
            'deskripsi_acara' => $request->deskripsi_acara,
        ]);

        // Update atau tambah dokumentasi baru
        if($request->has('dokumentasi')) {
            // Hapus dokumentasi lama jika ada (opsional, jika ingin mengganti dokumentasi)
            foreach ($acara->dokumentasi as $oldDokumentasi) {
                $oldDokumentasi->delete();
            }

            foreach ($request->file('dokumentasi') as $file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('images/acara'), $fileName);

                Dokumentasi::create([
                    'nama_dokumentasi' => $fileName,
                    'id_acara' => $acara->id,
                ]);
            }
        }

        return redirect()->route('admin.acara')->with('success', 'Acara dan dokumentasi berhasil diperbarui');
    }

    // Menghapus acara dan dokumentasi terkait
    public function deleteAcara($slug)
    {
        $acara = Acara::with('dokumentasi')->where('nama_acara', $slug)->firstOrFail();
        
        // Menghapus dokumentasi
        foreach ($acara->dokumentasi as $dokumentasi) {
            $dokumentasi->delete();
        }

        // Menghapus acara
        $acara->delete();

        return redirect()->route('admin.acara')->with('success', 'Acara dan dokumentasi berhasil dihapus');
    }
}
