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
            'highlight1' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'highlight2' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'highlight3' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'event' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'promosi' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);
    
        // Ambil data model terkait (misal: Highlightdata)
        $data = Hightlight::get();
    
        // Menyimpan gambar highlight1 jika ada
        if ($request->hasFile('highlight1')) {
            $highlight1Image = $request->file('highlight1');
            $highlight1ImageName = 'highlight1.' . $highlight1Image->getClientOriginalExtension();
    
            // Cek jika file lama ada dan hapus
            if ($data[0]->highlight1 && Storage::exists($data[0]->highlight1)) {
                Storage::delete($data[0]->highlight1);
            }
    
            // Simpan gambar baru
            $highlight1ImagePath = $highlight1Image->storeAs('img', $highlight1ImageName, 'public');
            $data[0]->path = 'storage/' . $highlight1ImagePath;
            $data[0]->save();
        }
    
        // Menyimpan gambar highlight2 jika ada
        if ($request->hasFile('highlight2')) {
            $highlight2Image = $request->file('highlight2');
            $highlight2ImageName = 'highlight2.' . $highlight2Image->getClientOriginalExtension();
    
            // Cek jika file lama ada dan hapus
            if ($data[1]->highlight2 && Storage::exists($data[1]->highlight2)) {
                Storage::delete($data[1]->highlight2);
            }
    
            // Simpan gambar baru
            $highlight2ImagePath = $highlight2Image->storeAs('img', $highlight2ImageName, 'public');
            $data[1]->path = 'storage/' . $highlight2ImagePath;
            $data[1]->save();
        }
    
        // Menyimpan gambar highlight3 jika ada
        if ($request->hasFile('highlight3')) {
            $highlight3Image = $request->file('highlight3');
            $highlight3ImageName = 'highlight3.' . $highlight3Image->getClientOriginalExtension();
    
            // Cek jika file lama ada dan hapus
            if ($data[2]->highlight3 && Storage::exists($data[2]->highlight3)) {
                Storage::delete($data[2]->highlight3);
            }
    
            // Simpan gambar baru
            $highlight3ImagePath = $highlight3Image->storeAs('img', $highlight3ImageName, 'public');
            $data[2]->path = 'storage/' . $highlight3ImagePath;
            $data[2]->save();
        }
        
    
        // Menyimpan gambar promosi jika ada
        if ($request->hasFile('promosi')) {
            $promosiImage = $request->file('promosi');
            $promosiImageName = 'promosi.' . $promosiImage->getClientOriginalExtension();
    
            // Cek jika file lama ada dan hapus
            if ($data[3]->promosi && Storage::exists($data[3]->promosi)) {
                Storage::delete($data[3]->promosi);
            }
    
            // Simpan gambar baru
            $promosiImagePath = $promosiImage->storeAs('img', $promosiImageName, 'public');
            $data[3]->path = 'storage/' . $promosiImagePath;
            $data[3]->save();
        }

        if ($request->hasFile('event')) {
           
            $eventImage = $request->file('event');
            $eventImageName = 'event.' . $eventImage->getClientOriginalExtension();
    
            // Cek jika file lama ada dan hapus
            if ($data[4]->event && Storage::exists($data[4]->event)) {
                Storage::delete($data[4]->event);
            }
    
            // Simpan gambar baru
            $eventImagePath = $eventImage->storeAs('img', $eventImageName, 'public');
            $data[4]->path = 'storage/' . $eventImagePath;
            $data[4]->keterangan = $request->input('keterangan');
            $data[4]->save();
        } 
        else if($request->has('keterangan')){
            $input = $request->validate([
                'keterangan' => 'string|max:255',
            ]);
            $data[4]->keterangan = $input['keterangan'];
            $data[4]->save();
        }
    
        return back()->with('success', 'Highlight images updated successfully!');
    }
    


}
