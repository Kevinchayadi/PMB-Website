<?php

namespace App\Exports;

use App\Models\TransactionHeader;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EventExport implements FromCollection, WithHeadings, WithMapping
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
        return TransactionHeader::with(['romo', 'seksi', 'doa', 'transactionDetails' => function ($query) {
            $query->with('umats', 'acara', 'admin');
        }])->where('status', $this->status)->get();
    }

    public function headings(): array
    {
        return [
            'ID Transaksi',
            'Nama Romo',
            'Nama Seksi',
            'Nama Doa',
            'Jadwal Transaksi',
            'Status',
            'ID Acara (Transaction Details)',
            'Nama Acara',
            'ID Umat (Transaction Details)',
            'Nama Umat (Transaction Details)',
            'Nama Admin (Transaction Details)',
            'Deskripsi Transaksi (Transaction Details)',
            'Pendapatan (Transaction Details)'
        ];
    }

    public function map($transactionHeader): array
    {
        // Mengambil data yang relevan dari TransactionHeader dan TransactionDetail
        $mappedData = [];

        // Data dari TransactionHeader
        $mappedData[] = $transactionHeader->id_transaction;               // ID Transaksi
        $mappedData[] = $transactionHeader->romo ? $transactionHeader->romo->nama_romo : 'N/A';  // Nama Romo
        $mappedData[] = $transactionHeader->seksi ? $transactionHeader->seksi->name : 'N/A';    // Nama Seksi
        $mappedData[] = $transactionHeader->doa ? $transactionHeader->doa->name : 'N/A';        // Nama Doa
        $mappedData[] = $transactionHeader->jadwal_transaction;           // Jadwal Transaksi
        $mappedData[] = $transactionHeader->status;                       // Status

        // Ambil transaction detail pertama (hanya ada 1 detail)
        $transactionDetail = $transactionHeader->transactionDetails->first();

        // Memeriksa apakah ada transaksi detail dan mengambil datanya
        if ($transactionDetail) {
            $mappedData[] = $transactionDetail->id_acara;                      // ID Acara
            $mappedData[] = $transactionDetail->acara ? $transactionDetail->acara->name : 'N/A';  // Nama Acara
            $mappedData[] = $transactionDetail->id_umat;                       // ID Umat
            $mappedData[] = $transactionDetail->umats ? $transactionDetail->umats->nama_umat : 'N/A';  // Nama Umat
            $mappedData[] = $transactionDetail->id_admin;                      // Nama Admin
            $mappedData[] = $transactionDetail->deskripsi_transaksi;           // Deskripsi Transaksi
            $mappedData[] = $transactionDetail->pendapatan;                    // Pendapatan
        } else {
            // Jika tidak ada detail (jika ada kemungkinan kosong)
            $mappedData[] = 'N/A';  // ID Acara
            $mappedData[] = 'N/A';  // Nama Acara
            $mappedData[] = 'N/A';  // ID Umat
            $mappedData[] = 'N/A';  // Nama Umat
            $mappedData[] = 'N/A';  // Nama Admin
            $mappedData[] = 'N/A';  // Deskripsi Transaksi
            $mappedData[] = 'N/A';  // Pendapatan
        }

        return $mappedData;
    }
}
