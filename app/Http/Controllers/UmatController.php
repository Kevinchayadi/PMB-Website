<?php

namespace App\Http\Controllers;

use App\Models\Hightlight;
use App\Models\Umat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class UmatController extends Controller
{
    public function highlight(){
        $highlight=Hightlight::get();
        // dd($highlight);
        return view('admin.viewPage.landingpage.highlight', compact('highlight'));
    }
    
    

public function highlightUpdate(Request $request)
{
    // Melakukan validasi pada request
    $validated = $request->validate([
        // Validasi untuk highlight1, highlight2, highlight3 (gambar)
        'highlight1' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        'highlight2' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        'highlight3' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',

        // Validasi untuk event dan promosi (gambar)
        'event' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        'promosi' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
    ]);

    // Path untuk gambar highlight, event, dan promosi
    $highlight1ImagePath = null;
    $highlight2ImagePath = null;
    $highlight3ImagePath = null;
    $eventImagePath = null;
    $promosiImagePath = null;

    // Menyimpan gambar highlight1 jika ada
    if ($request->hasFile('highlight1')) {
        $highlight1Image = $request->file('highlight1');
        $highlight1ImageName = 'highlight1.jpg'; // Nama file untuk highlight1

        // Cek jika file lama ada dan hapus
        if (Storage::exists('public/img/highlight/' . $highlight1ImageName)) {
            Storage::delete('public/img/highlight/' . $highlight1ImageName);
        }

        // Simpan gambar baru
        $highlight1ImagePath = $highlight1Image->storeAs('img/highlight', $highlight1ImageName, 'public');
    }

    // Menyimpan gambar highlight2 jika ada
    if ($request->hasFile('highlight2')) {
        $highlight2Image = $request->file('highlight2');
        $highlight2ImageName = 'highlight2.jpg'; // Nama file untuk highlight2

        // Cek jika file lama ada dan hapus
        if (Storage::exists('public/img/highlight/' . $highlight2ImageName)) {
            Storage::delete('public/img/highlight/' . $highlight2ImageName);
        }

        // Simpan gambar baru
        $highlight2ImagePath = $highlight2Image->storeAs('img/highlight', $highlight2ImageName, 'public');
    }

    // Menyimpan gambar highlight3 jika ada
    if ($request->hasFile('highlight3')) {
        $highlight3Image = $request->file('highlight3');
        $highlight3ImageName = 'highlight3.jpg'; // Nama file untuk highlight3

        // Cek jika file lama ada dan hapus
        if (Storage::exists('public/img/highlight/' . $highlight3ImageName)) {
            Storage::delete('public/img/highlight/' . $highlight3ImageName);
        }

        // Simpan gambar baru
        $highlight3ImagePath = $highlight3Image->storeAs('img/highlight', $highlight3ImageName, 'public');
    }

    // Menyimpan gambar event jika ada
    if ($request->hasFile('event')) {
        $eventImage = $request->file('event');
        $eventImageName = 'event.jpg'; // Nama file untuk event

        // Cek jika file lama ada dan hapus
        if (Storage::exists('public/img/event/' . $eventImageName)) {
            Storage::delete('public/img/event/' . $eventImageName);
        }

        // Simpan gambar baru
        $eventImagePath = $eventImage->storeAs('img/event', $eventImageName, 'public');
    }

    // Menyimpan gambar promosi jika ada
    if ($request->hasFile('promosi')) {
        $promosiImage = $request->file('promosi');
        $promosiImageName = 'promosi.jpg'; // Nama file untuk promosi

        // Cek jika file lama ada dan hapus
        if (Storage::exists('public/img/promosi/' . $promosiImageName)) {
            Storage::delete('public/img/promosi/' . $promosiImageName);
        }

        // Simpan gambar baru
        $promosiImagePath = $promosiImage->storeAs('img/promosi', $promosiImageName, 'public');
    }

    // Menyimpan flash data ke session dan mengarahkan kembali ke halaman sebelumnya
    return back()->with('success', 'Highlight images updated successfully!');
}


}
