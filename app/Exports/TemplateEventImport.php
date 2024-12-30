<?php

namespace App\Exports;

use App\Models\Romo;
use App\Models\Acara;
use App\Models\Seksi;
use App\Models\Doa;
use App\Models\Umat;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TemplateEventImport implements WithMultipleSheets
{
    // Method ini mengembalikan sheet yang akan diexport
    public function sheets(): array
    {
        return [
            new HeaderSheet(),
            new ExampleSheet(),
            new DataSheet(),
        ];
    }
}

class HeaderSheet implements FromArray, WithTitle
{
    // Sheet pertama dengan informasi header
    public function array(): array
    {
        return [
            [
                'status', 'Judul', 'ID Romo', 'ID Acara', 'ID Doa', 'Jadwal Transaction', 'Deskripsi Transaksi',
            ],
            [
                'Penjelasan: Kolom ini akan diisi secara otomatis oleh sistem dengan nilai "Accepted" atau "Rejected" setelah proses validasi.',
                'Penjelasan: Judul wajib diisi dengan string, misalnya "Misa Pagi".',
                'Penjelasan: ID Romo wajib diisi dengan ID yang valid dari tabel `romos`.',
                'Penjelasan: ID Acara wajib diisi dengan ID yang valid dari tabel `acaras`.',
                'Penjelasan: ID Doa wajib diisi dengan ID yang valid dari tabel `doas`.',
                'Penjelasan: Jadwal Transaction wajib diisi dengan tanggal/waktu yang valid dan tidak boleh lebih awal dari hari ini.',
                'Penjelasan: Deskripsi Transaksi bersifat opsional, dan jika diisi, tidak boleh lebih dari 255 karakter.',
            ],
        ];
    }

    public function title(): string
    {
        return 'Input Header';
    }
}

class ExampleSheet implements FromArray, WithTitle
{
    // Sheet kedua dengan contoh data
    public function array(): array
    {
        return [
            ['Judul', 'ID Romo', 'ID Acara', 'ID Doa', 'Jadwal Transaction', 'Deskripsi Transaksi'],
            [
                'Penjelasan: Kolom ini akan diisi secara otomatis oleh sistem dengan nilai "Accepted" atau "Rejected" setelah proses validasi.',
                'Penjelasan: Judul wajib diisi dengan string, misalnya "Misa Pagi".',
                'Penjelasan: ID Romo wajib diisi dengan ID yang valid dari tabel `romos`.',
                'Penjelasan: ID Acara wajib diisi dengan ID yang valid dari tabel `acaras`.',
                'Penjelasan: ID Doa wajib diisi dengan ID yang valid dari tabel `doas`.',
                'Penjelasan: Jadwal Transaction wajib diisi dengan tanggal/waktu yang valid dan tidak boleh lebih awal dari hari ini.',
                'Penjelasan: Deskripsi Transaksi bersifat opsional, dan jika diisi, tidak boleh lebih dari 255 karakter.',
            ],
            ['Misa Pagi', 1, 2, 1, '2024-12-31 09:00:00', 'Misa pagi dengan Romo X'],
            ['Misa Malam', 2, 1, 2, '2024-12-31 18:00:00', 'Misa malam dengan Romo Y'],
            ['Pemberkatan', 1, 3, 3, '2024-12-30 10:00:00', 'Pemberkatan dengan Romo Z'],
        ];
    }

    public function title(): string
    {
        return 'Contoh';
    }
}

class DataSheet implements FromArray, WithTitle, WithStyles
{
    // Sheet ketiga dengan data yang diambil dari database
    public function array(): array
    {
        // Mengambil data dari database
        $romos = Romo::get();
        $acaras = Acara::get();
        $seksis = Seksi::get();
        $doas = Doa::get();
        $umats = Umat::get();

        // Menyiapkan header dan data untuk setiap section
        $data = [
            ['Romo Data'],
            ['Nama Romo', 'ID Romo'],
        ];

        // Memetakan data dari model menjadi array
        $romoData = $romos->map(function ($romo) {
            return [$romo->nama_romo, $romo->id_romo +100];
        })->toArray();

        $acaraData = $acaras->map(function ($acara) {
            return [$acara->nama_acara, $acara->id_acara+230];
        })->toArray();

        $seksiData = $seksis->filter(function ($seksi) {
            return !is_null($seksi->nama_seksi) && !is_null($seksi->id_seksi);
        })->map(function ($seksi) {
            return [$seksi->nama_seksi, $seksi->id_seksi + 540];
        })->toArray();

        $doaData = $doas->map(function ($doa) {
            return [$doa->nama_doa, $doa->id_doa];
        })->toArray();

        $umatData = $umats->map(function ($umat) {
            return [$umat->nama_umat, $umat->id_umat+1000];
        })->toArray();

        // dd($romoData, $acaraData, $seksiData, $doaData, $umatData);

        $mergedData = array_merge(
            $data,
            $romoData,
            [['']], // Separator kosong
            [['Acara Data']],  // Wrap with array to make it consistent
            [['Nama Acara', 'ID Acara']],
            $acaraData,
            [['']],  // Separator kosong
            [['Seksi Data']],  // Wrap with array to make it consistent
            [['Nama Seksi', 'ID Seksi']],
            $seksiData,
            [['']],  // Separator kosong
            [['Doa Data']],  // Wrap with array to make it consistent
            [['Nama Doa', 'ID Doa']],
            $doaData,
            [['']],  // Separator kosong
            [['Umat Data']],  // Wrap with array to make it consistent
            [['Nama Umat', 'ID Umat']],
            $umatData
        );
        
        // dd($mergedData);
        return $mergedData;

        // return [
        //     ['Romo Data'],
        //     ['Nama Romo', 'ID Romo'],
        //     $romoData,
        //     [['']], // Separator kosong
        //     ['Acara Data'],
        //     ['Nama Acara', 'ID Acara'],
        //     $acaraData,
        //     [['']], // Separator kosong
        //     ['Seksi Data'],
        //     ['Nama Seksi', 'ID Seksi'],
        //     $seksiData,
        //     [['']], // Separator kosong
        //     ['Doa Data'],
        //     ['Nama Doa', 'ID Doa'],
        //     $doaData,
        //     [['']], // Separator kosong
        //     ['Umat Data'],
        //     ['Nama Umat', 'ID Umat'],
        // Menggabungkan semua data menjadi satu array
        // return array_merge(
        //     $data,
        //     $romoData,
        //     [['']], // Separator kosong
        //     ['Acara Data'],
        //     ['Nama Acara', 'ID Acara'],
        //     $acaraData,
        //     [['']], // Separator kosong
        //     ['Seksi Data'],
        //     ['Nama Seksi', 'ID Seksi'],
        //     $seksiData,
        //     [['']], // Separator kosong
        //     ['Doa Data'],
        //     ['Nama Doa', 'ID Doa'],
        //     $doaData,
        //     [['']], // Separator kosong
        //     ['Umat Data'],
        //     ['Nama Umat', 'ID Umat'],
        //     $umatData
        // );
    }

    public function title(): string
    {
        return 'ID Data';
    }

    public function styles(Worksheet $sheet)
    {
        // Merge cells for the header
        $sheet->mergeCells('A1:B1');
        // $sheet->mergeCells('A3:B3');

        // Menerapkan style untuk header dan sub-header
        return [
            1 => ['font' => ['bold' => true, 'size' => 14]], // Header "Romo Data"
            // 2 => ['font' => ['bold' => true, 'size' => 12]], // Sub-header "Nama Romo", "Nama Acara", dll.
            // 5 => ['font' => ['bold' => true, 'size' => 12]], // Sub-header "Acara Data"
            // 8 => ['font' => ['bold' => true, 'size' => 12]], // Sub-header "Seksi Data"
            // 11 => ['font' => ['bold' => true, 'size' => 12]], // Sub-header "Doa Data"
            // 14 => ['font' => ['bold' => true, 'size' => 12]], // Sub-header "Umat Data"
        ];
    }
}
