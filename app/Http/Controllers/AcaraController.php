<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Acara;
use Illuminate\Http\Request;
use App\Models\Documentation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AcaraController extends Controller
{
    public function acaraIndex()
    {
        // Ambil semua acara beserta dokumentasinya
        $acara = Acara::with('documentations')->get();
        return view('admin.viewPage.landingpage.acara.layanan', ['acara' => $acara]);
    }

    public function addAcara()
    {
        return view('admin.viewPage.landingpage.acara.addLayanan');
    }

    public function storeAcara(Request $request)
    {
        $request->validate([
            'nama_acara' => 'required',
            'deskripsi_acara' => 'required',
            'tipe_acara' => 'required',
            'dokumentasi' => 'required|array|min:1|max:3',
            'dokumentasi.*' => 'nullable|image|max:2048',
        ]);

        try {
            DB::beginTransaction();

            // Simpan acara
            $acara = Acara::create([
                'nama_acara' => $request->nama_acara,
                'tipe_acara' => $request->tipe_acara,
                'deskripsi_acara' => $request->deskripsi_acara,
            ]);

            // Simpan dokumentasi
            if ($request->hasFile('dokumentasi')) {
                $curr = 1;
                foreach ($request->file('dokumentasi') as $file) {
                    $extension = $file->getClientOriginalExtension();
                    $namefile = $request->nama_acara . '_' . $curr . '.' . $extension;
                    $file->storeAs('dokumentasi', $namefile);
                    $curr++;

                    $acara->documentations()->create(['nama_dokumentasi' => $namefile]);
                }
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Gagal menyimpan acara: ' . $th->getMessage());
            return back()->with('error', 'Gagal menambahkan acara!');
        }

        return redirect()->route('admin.acara')->with('success', 'Acara dan dokumentasi berhasil ditambahkan');
    }

    public function updateAcara($slug)
    {
        //Ambil acara berdasarkan slug beserta dokumentasinya
        $acara = Acara::with('documentations')->where('slug', $slug)->firstOrFail();
        return view('admin.viewPage.landingpage.acara.updateLayanan', compact('acara'));
    }

    public function updatedAcara(Request $request, $slug)
    {
        $acara = Acara::with('documentations')->where('slug', $slug)->firstOrFail();

        $request->validate([
            'nama_acara' => 'required',
            'deskripsi_acara' => 'required',
            'tipe_acara' => 'required',
            'dokumentasi' => 'nullable|array|min:1|max:3',
            'dokumentasi.*' => 'nullable|image|max:2048',
        ]);

        try {
            DB::beginTransaction();

            // Update acara
            $acara->update([
                'nama_acara' => $request->nama_acara,
                'tipe_acara' => $request->tipe_acara,
                'deskripsi_acara' => $request->deskripsi_acara,
            ]);

            // Update dokumentasi jika ada file baru
            if ($request->hasFile('dokumentasi')) {
                // Hapus dokumentasi lama
                foreach ($acara->documentations as $oldDokumentasi) {
                    Storage::delete('dokumentasi/' . $oldDokumentasi->nama_dokumentasi);
                    $oldDokumentasi->delete();
                }

                // Simpan dokumentasi baru
                $curr = 1;
                foreach ($request->file('dokumentasi') as $file) {
                    $extension = $file->getClientOriginalExtension();
                    $namefile = $request->nama_acara . '_' . $curr . '.' . $extension;
                    $file->storeAs('dokumentasi', $namefile);
                    $curr++;

                    $acara->documentations()->create(['nama_dokumentasi' => $namefile]);
                }
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Gagal melakukan update acara: ' . $th->getMessage());
            return back()->with('error', 'Gagal melakukan update acara!');
        }

        return redirect()->route('admin.viewPage.landingpage.acara.layanan')->with('success', 'Acara dan dokumentasi berhasil diperbarui');
    }

    public function deleteAcara($slug)
    {
        $acara = Acara::with('documentations')->where('slug', $slug)->firstOrFail();

        try {
            DB::beginTransaction();

            // Hapus dokumentasi
            foreach ($acara->documentations as $dokumentasi) {
                Storage::delete('dokumentasi/' . $dokumentasi->nama_dokumentasi);
                $dokumentasi->delete();
            }

            // Hapus acara
            $acara->delete();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Gagal menghapus acara: ' . $th->getMessage());
            return back()->with('error', 'Gagal menghapus acara!');
        }

        return redirect()->route('admin.viewPage.landingpage.acara.layanan')->with('success', 'Acara dan dokumentasi berhasil dihapus');
    }
}
