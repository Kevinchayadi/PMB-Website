<?php

namespace App\Exports;

use App\Models\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RequestExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $status;

    public function __construct($status)
    {
        $this->status = $status;
    }

    public function collection()
    {
        return Request::with('umat') // Relasi dengan tabel Umat
            ->where('status', $this->status)
            ->get();
    }

    public function headings(): array
    {
        return [
            'ID Request',
            'Nama Acara',
            'Nama Umat',
            'Nama Terlibat Satu',
            'Nama Terlibat Dua',
            'Nama Romo',
            'Jadwal Acara',
            'Deskripsi Pengajuan',
            'Status'
        ];
    }

    /**
     * Mapping data untuk setiap baris di Excel
     */
    public function map($request): array
    {
 
        $umat = $request->umat ? $request->umat->nama_umat : 'N/A';

        return [
            $request->id,                           // ID Request
            $request->nama_acara,                    // Nama Acara
            $umat,                                   // Nama Umat
            $request->nama_terlibat_satu,            // Nama Terlibat Satu
            $request->nama_terlibat_dua,             // Nama Terlibat Dua
            $request->nama_romo,                     // Nama Romo
            $request->jadwal_acara ? $request->jadwal_acara->format('Y-m-d') : 'N/A', // Jadwal Acara
            $request->deskripsi_pengajuan,           // Deskripsi Pengajuan
            $request->status,                        // Status Request
        ];
    }
}
