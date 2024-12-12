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
    public function excelForm(){
        return view('umatsInput');
    }
    public function createUserExcel(Request $request)
    {
        // Validasi file yang di-upload
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:2048',
        ]);

        // Ambil file dari request
        $file = $request->file('file');

        // Load file Excel
        $data = Excel::toArray([], $file);

        // Asumsikan sheet pertama yang berisi data umat
        $rows = $data[0];

        // Loop untuk menyimpan data satu per satu ke database
        foreach ($rows as $row) {
            // Pastikan setiap kolom sudah ada di dalam data
            if (!empty($row['nama_umat']) && !empty($row['email_umat']) && !empty($row['password'])) {
                Umat::create([
                    'nama_umat' => $row['nama_umat'],
                    'email_umat' => $row['email_umat'],
                    'password' => bcrypt($row['password']), // Password harus di-hash
                    'wilayah' => $row['wilayah'],
                    'lingkungan' => $row['lingkungan'],
                    'nomohp_umat' => $row['nomohp_umat'],
                    'alamat' => $row['alamat'],
                    'status' => $row['status'],
                    'pekerjaan' => $row['pekerjaan'],
                ]);
            }
        }

        // Setelah data berhasil diimpor, beri feedback ke user
        return redirect()->back()->with('success', 'Data berhasil diimport!');
    }
}
