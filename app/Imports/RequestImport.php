<?php

namespace App\Imports;

use App\Models\Acara;
use App\Models\Request;
use App\Models\Romo;
use App\Models\Umat;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class RequestImport implements ToModel, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    private $failedRows = [];
    public function model(array $row)
    {
        $row['romo'] = $row['romo'] - 100;
        $row['acara'] = $row['acara'] - 230;
        $row['umat'] = $row['umat'] - 1000;
        $validator = Validator::make($row, [
            'acara' => 'required|integer|exists:acaras,id_acara', // Check if exists in acaras table
            'umat' => 'required|integer|exists:umats,id_umat', // Already checking umat exists
            'nama_terlibat_satu' => 'required|string',
            'nama_terlibat_dua' => 'required|string',
            'romo' => 'nullable|string|exists:romos,id_romo', // Check if exists in romos table when filled
            'jadwal_acara' => 'required|date',
            'deskripsi_pengajuan' => 'nullable|string',
        ]);

        // Jika validasi gagal, simpan baris tersebut ke dalam array failedRows
        if ($validator->fails()) {
            $this->failedRows[] = [
                'status' => implode(', ', $validator->errors()->all()), // Menggabungkan semua error menjadi satu string
                'nama_acara' => $row['acara'],
                'id_umat' => $row['umat'],
                'nama_terlibat_satu' => $row['nama_terlibat_satu'],
                'nama_terlibat_dua' => $row['nama_terlibat_dua'],
                'nama_romo' => $row['romo'] ?? null, // Menambahkan null jika tidak ada
                'jadwal_acara' => $row['jadwal_acara'],
                'deskripsi_pengajuan' => $row['deskripsi_pengajuan'] ?? null, // Menambahkan null jika tidak ada
            ];
            // Kembalikan null jika data tidak valid
            return null;
        }
        $umat = Umat::where('id_umat', $row['umat'])->first();
        $romo = Romo::where('id_romo', $row['romo'])->first();
        $acara = Acara::where('id_acara', $row['acara'])->first();

        // Jika validasi berhasil, kembalikan model yang sesuai
        Request::create([
            'nama_acara' => $acara->nama_acara,
            'id_umat' => $umat->nama_umat,
            'nama_terlibat_satu' => $row['nama_terlibat_satu'],
            'nama_terlibat_dua' => $row['nama_terlibat_dua'],
            'nama_romo' => $romo->nama_romo,
            'jadwal_acara' => $row['jadwal_acara'],
            'deskripsi_pengajuan' => $row['deskripsi_pengajuan'],
        ]);
    }

    /**
     * Mengembalikan baris yang gagal divalidasi.
     *
     * @return array
     */
    public function getFailedRows()
    {
        return $this->failedRows;
    }
}
