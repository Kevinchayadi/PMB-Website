<?php

namespace App\Exports;

use App\Models\Acara;
use App\Models\Doa;
use App\Models\Romo;
use App\Models\Seksi;
use App\Models\Umat;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class errorRequest implements WithMultipleSheets
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function sheets(): array
    {
        return [new HeaderSheet(), new ExampleSheet(), new DataSheet()];
    }
}

class HeaderSheet implements FromArray, WithTitle, WithStyles
{
    // Sheet pertama dengan informasi header
    public function array(): array
    {
        $data[] = [
            ['status', 'acara', 'umat', 'nama_terlibat_satu', 'nama_terlibat_dua', 'romo', 'jadwal_acara', 'deskripsi_pengajuan'],
            ['Penjelasan: Kolom ini akan diisi secara otomatis oleh sistem dengan nilai "Accepted" atau "Rejected" setelah proses validasi.', 'Penjelasan: acara wajib diisi berdasarkan kode pada halaman data.', 'Penjelasan: Umat wajib diisi berdasarkan kode pada halaman data. ', 'Penjelasan: Nama terlibat satu wajib diisi dengan string yang menjelaskan nama pihak yang terlibat. Kolom ini tidak boleh kosong.', 'Penjelasan: Nama terlibat dua bersifat opsional. Jika diisi, panjang karakter tidak boleh lebih dari 255 karakter.', 'Penjelasan: Romo bersifat opsional. diisi berdasarkan kode pada halaman data.', 'Penjelasan: Jadwal acara wajib diisi dengan tanggal yang valid. Format tanggal harus sesuai (misalnya: YYYY-MM-DD). Tanggal yang dimasukkan tidak boleh lebih awal dari hari ini.Pastikan dalam format DATE!!!', 'Penjelasan: Deskripsi pengajuan bersifat opsional. Jika diisi, panjang karakter tidak boleh lebih dari 255 karakter. Pastikan deskripsi singkat dan jelas terkait pengajuan acara.'],
        ];
        $failedRows = Session::get('failed_rows', []);
        if (!empty($failedRows)) {
            foreach ($failedRows as $row) {
                $data[] = [$row['status'] ?? '', $row['nama_acara'] ?? '', $row['id_umat'] ?? '', $row['nama_terlibat_satu'] ?? '', $row['nama_terlibat_dua'] ?? '', $row['nama_romo'] ?? '', $row['jadwal_acara'] ?? '', $row['deskripsi_pengajuan'] ?? ''];
            }
        }
        return $data;
    }

    public function title(): string
    {
        return 'Input_Sheet';
    }
    public function styles(Worksheet $sheet)
    {
        // Menambahkan wrap text untuk baris kedua
        $sheet->getStyle('A1:I2')->getAlignment()->setWrapText(true);
        $sheet->getStyle('A1:I2')->getAlignment()->setHorizontal('center');

        // Mengatur lebar kolom agar mendekati 200 piksel
        foreach (range('A', 'I') as $col) {
            $sheet->getColumnDimension($col)->setWidth(27.57);
        }
        $sheet->getStyle('A1:I1')->getFill()->setFillType('solid')->getStartColor()->setRGB('D3D3D3');

        // Menambahkan warna latar belakang abu-abu lebih muda untuk A2:B2
        $sheet->getStyle('A2:I2')->getFill()->setFillType('solid')->getStartColor()->setRGB('E8E8E8');

        // Menambahkan warna tab halaman menjadi hijau
        $sheet->getTabColor()->setRGB('00FF00');

        return [
                // Menambahkan style tambahan jika dibutuhkan
            ];
    }
}

class ExampleSheet implements FromArray, WithTitle, WithStyles
{
    // Sheet kedua dengan contoh data
    public function array(): array
    {
        return [
            ['status', 'acara', 'umat', 'nama_terlibat_satu', 'nama_terlibat_dua', 'romo', 'jadwal_acara', 'deskripsi_pengajuan'],
            ['Penjelasan: Kolom ini akan diisi secara otomatis oleh sistem dengan nilai "Accepted" atau "Rejected" setelah proses validasi.', 'Penjelasan: acara wajib diisi berdasarkan kode pada halaman data.', 'Penjelasan: Umat wajib diisi berdasarkan kode pada halaman data. ', 'Penjelasan: Nama terlibat satu wajib diisi dengan string yang menjelaskan nama pihak yang terlibat. Kolom ini tidak boleh kosong.', 'Penjelasan: Nama terlibat dua bersifat opsional. Jika diisi, panjang karakter tidak boleh lebih dari 255 karakter.', 'Penjelasan: Romo bersifat opsional. diisi berdasarkan kode pada halaman data.', 'Penjelasan: Jadwal acara wajib diisi dengan tanggal yang valid. Format tanggal harus sesuai (misalnya: YYYY-MM-DD). Tanggal yang dimasukkan tidak boleh lebih awal dari hari ini.', 'Penjelasan: Deskripsi pengajuan bersifat opsional. Jika diisi, panjang karakter tidak boleh lebih dari 255 karakter. Pastikan deskripsi singkat dan jelas terkait pengajuan acara.'],
            ['', '231', 1004, '102', 'satria', null, '2024-12-31', 'Misa pagi dengan Romo X'],
            ['', '231', 1002, '1004', 'paul', null, '2024-12-31', 'Misa malam dengan Romo Y'],
            [
                '',
                '235',
                10007,
                '1005',
                'jeni',
                null,
                '2024-12-30',
                'Pemberkatan dengan Romo Z', // Misalnya jika terjadi kesalahan validasi
            ],
        ];
    }

    public function title(): string
    {
        return 'Example_sheet';
    }
    public function styles(Worksheet $sheet)
    {
        // Menambahkan wrap text untuk baris kedua
        $sheet->getStyle('A1:I2')->getAlignment()->setWrapText(true);

        $sheet->getStyle('A1:I2')->getAlignment()->setHorizontal('center');

        // Mengatur lebar kolom agar mendekati 200 piksel
        foreach (range('A', 'I') as $col) {
            $sheet->getColumnDimension($col)->setWidth(27.57);
        }
        $sheet->getStyle('A1:I1')->getFill()->setFillType('solid')->getStartColor()->setRGB('D3D3D3');

        // Menambahkan warna latar belakang abu-abu lebih muda untuk A2:B2
        $sheet->getStyle('A2:I2')->getFill()->setFillType('solid')->getStartColor()->setRGB('E8E8E8');

        // Menambahkan warna tab halaman menjadi hijau
        $sheet->getTabColor()->setRGB('FFFFFF');
        return [
                // Menambahkan style tambahan jika dibutuhkan
            ];
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
        $data = [['Romo Data'], ['Nama Romo', 'ID Romo']];

        // Memetakan data dari model menjadi array
        $romoData = $romos
            ->map(function ($romo) {
                return [$romo->nama_romo, $romo->id_romo + 100];
            })
            ->toArray();

        $acaraData = $acaras
            ->map(function ($acara) {
                return [$acara->nama_acara, $acara->id_acara + 230];
            })
            ->toArray();

        $seksiData = $seksis
            ->filter(function ($seksi) {
                return !is_null($seksi->nama_seksi) && !is_null($seksi->id_seksi);
            })
            ->map(function ($seksi) {
                return [$seksi->nama_seksi, $seksi->id_seksi + 540];
            })
            ->toArray();

        $doaData = $doas
            ->map(function ($doa) {
                return [$doa->nama_doa, $doa->id_doa + 700];
            })
            ->toArray();

        $umatData = $umats
            ->map(function ($umat) {
                return [$umat->nama_umat, $umat->id_umat + 1000];
            })
            ->toArray();

        // dd($romoData, $acaraData, $seksiData, $doaData, $umatData);

        $mergedData = array_merge(
            $data,
            $romoData,
            [['']], // Separator kosong
            [['Acara Data']], // Wrap with array to make it consistent
            [['Nama Acara', 'ID Acara']],
            $acaraData,
            [['']], // Separator kosong
            [['Seksi Data']], // Wrap with array to make it consistent
            [['Nama Seksi', 'ID Seksi']],
            $seksiData,
            [['']], // Separator kosong
            [['Doa Data']], // Wrap with array to make it consistent
            [['Nama Doa', 'ID Doa']],
            $doaData,
            [['']], // Separator kosong
            [['Umat Data']], // Wrap with array to make it consistent
            [['Nama Umat', 'ID Umat']],
            $umatData,
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

        $sheet->getColumnDimension('A')->setWidth(60);
        $sheet->getStyle('B:B')->getAlignment()->setHorizontal('center');

        $sheet->getTabColor()->setRGB('FFFF00');

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
