<?php

namespace App\Http\Controllers;

use App\Models\Hightlight;
use App\Models\Umat;
use Illuminate\Http\Request;
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
        // Validasi untuk highlight1, highlight2, highlight3
        'highlight1' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        'highlight2' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        'highlight3' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',

        // Validasi untuk event dan promosi dalam bentuk gambar
        'event' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        'promosi' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
    ]);

    // Jika validasi berhasil, kamu bisa melanjutkan proses berikutnya
    // Misalnya menyimpan data atau memproses gambar

    // Contoh menyimpan gambar jika ada
    $eventImagePath = null;
    $promosiImagePath = null;

    if ($request->hasFile('event')) {
        $eventImage = $request->file('event');
        // Menyimpan gambar ke folder 'public/img'
        $eventImagePath = $eventImage->store('img/event', 'public');
    }

    if ($request->hasFile('promosi')) {
        $promosiImage = $request->file('promosi');
        // Menyimpan gambar ke folder 'public/img'
        $promosiImagePath = $promosiImage->store('img/promosi', 'public');
    }

    // Lakukan proses lain yang diperlukan, misalnya menyimpan data ke database

    return response()->json([
        'message' => 'Highlight updated successfully',
        'data' => $validated,
        'event_image' => $eventImagePath, // Menyertakan path gambar event
        'promosi_image' => $promosiImagePath, // Menyertakan path gambar promosi
    ]);
}

}
