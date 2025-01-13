<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Acara;
use App\Models\Doa;
use Illuminate\Http\Request;
use App\Models\Documentation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AcaraController extends Controller
{
    public function acaraIndex(Request $request)
    {
        // Ambil parameter pencarian dari request
        $search = $request->input('search');

        // Query data berdasarkan pencarian (jika ada)
        $acara = Acara::when($search, function ($query, $search) {
            return $query->where('nama_acara', 'like', "%{$search}%");
        })
            ->latest()
            ->paginate(20)
            ->withQueryString();

        // Return view dengan data acara
        return view('admin.viewPage.landingpage.acara.layanan', ['acara' => $acara, 'search' => $search]);
    }

    public function addAcara()
    {
        return view('admin.viewPage.landingpage.acara.addLayanan');
    }

    public function storeAcara(Request $request)
    {
        // dd($request->all());
        $input = $request->validate([
            'nama_acara' => 'required|min:5',
            'deskripsi_acara' => 'required',
            'tipe_acara' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'nama_acara.required' => 'Kolom Nama Acara harus diisi.',
            'nama_acara.min' => 'Kolom Nama Acara harus memiliki minimal :min karakter.',
            'deskripsi_acara.required' => 'Kolom Deskripsi Acara harus diisi.',
            'tipe_acara.required' => 'Kolom Tipe Acara harus diisi.',
            'foto.image' => 'Kolom Foto harus berupa gambar.',
            'foto.mimes' => 'Kolom Foto harus dalam format: jpeg, png, jpg, gif, svg.',
            'foto.max' => 'Ukuran file Foto tidak boleh lebih dari :max kilobyte.',
        ]);

        try {
            DB::beginTransaction();
            $foto = str_replace('/[^a-zA-Z0-9]/', '-', $input['nama_acara']);
            if ($request->hasFile('foto')) {
                // dd($request);
                $file = $request->file('foto');

                $fileName = $foto . '.' . $file->getClientOriginalExtension();

                $filePath = $file->storeAs('acara', $fileName, 'public');

                $input['path'] = $filePath;
            }
            // Simpan acara
            Acara::create($input);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Gagal menyimpan acara: ' . $th->getMessage());
            return back()->with('error', 'Gagal menambahkan acara!');
        }

        return redirect()->route('admin.acara')->with('success', 'Layanan berhasil ditambahkan!');
    }

    public function updateAcara($slug)
    {
        //Ambil acara berdasarkan slug beserta dokumentasinya
        $acara = Acara::get()->where('slug', $slug)->first();
        // dd($acara);
        return view('admin.viewPage.landingpage.acara.updateLayanan', compact('acara'));
    }

    public function updatedAcara(Request $request, $slug)
    {
        $acara = Acara::get()->where('slug', $slug)->firstOrFail();

        $input = $request->validate([
            'nama_acara' => 'required|string|max:255', // Menambahkan aturan string dan batasan karakter
            'deskripsi_acara' => 'required|string', // Menambahkan aturan string
            'tipe_acara' => 'required|string', // Menambahkan aturan string
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi untuk foto
        ], [
            'nama_acara.required' => 'Kolom Nama Acara harus diisi.',
            'deskripsi_acara.required' => 'Kolom Deskripsi Acara harus diisi.',
            'tipe_acara.required' => 'Kolom Tipe Acara harus diisi.',
            'foto.image' => 'Kolom Foto harus berupa gambar.',
            'foto.mimes' => 'Kolom Foto harus dalam format: jpeg, png, jpg, gif, svg.',
            'foto.max' => 'Ukuran file Foto tidak boleh lebih dari :max kilobyte.',
        ]);
        // dd($request->all());

        // try {
        DB::beginTransaction();
        $foto = str_replace('/[^a-zA-Z0-9]/', '-', $input['nama_acara']);

        if ($request->hasFile('foto')) {
            if ($acara->path) {
                Storage::disk('public')->delete($acara->path);
            }

            $file = $request->file('foto');

            $fileName = $foto . '.' . $file->getClientOriginalExtension();

            $filePath = $file->storeAs('acara', $fileName, 'public');

            $input['path'] = $filePath;
        }
        // Update acara
        $acara->update($input);
        DB::commit();
        return redirect()->route('admin.acara')->with('success', 'Layanan berhasil diperbarui!');
    }

    public function deleteAcara($slug)
    {
        $acara = Acara::where('slug', $slug)->firstOrFail();

        try {
            DB::beginTransaction();

            // Hapus acara
            $acara->delete();

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Gagal menghapus acara: ' . $th->getMessage());
            return back()->with('error', 'Gagal menghapus acara!');
        }

        return redirect()->route('admin.acara')->with('success', 'Layanan berhasil dihapus!');
    }
}
