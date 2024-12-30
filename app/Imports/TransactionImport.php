<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TransactionImport implements ToArray, WithHeadingRow
{
    /**
     * Menangani data Excel dan mengimpor sebagai array
     *
     * @param array $rows
     * @return void
     */
    public function array(array $rows)
    {
        foreach ($rows as $row) {
            // Validasi data
            $validator = Validator::make($row, [
                'judul' => 'required|string|max:255',
                'id_romo' => 'required|exists:romos,id_romo',
                'id_acara' => 'required|exists:acaras,id_acara',
                'id_doa' => 'required|exists:doas,id_doa',
                'jadwal_transaction' => 'required|date|after_or_equal:today',
                'deskripsi_transaksi' => 'nullable|string|max:255',
            ]);

            // Jika ada kesalahan dalam validasi, lanjutkan ke baris berikutnya
            if ($validator->fails()) {
                continue;
            }

            // Menyimpan data ke database (misalnya, menggunakan DB facade)
            DB::table('acaras')->insert([
                'judul' => $row['judul'],
                'id_romo' => $row['id_romo'],
                'id_acara' => $row['id_acara'],
                'id_doa' => $row['id_doa'],
                'jadwal_transaction' => $row['jadwal_transaction'],
                'deskripsi_transaksi' => $row['deskripsi_transaksi'] ?? null,
            ]);
        }
    }
}
