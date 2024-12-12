<?php

namespace App\Exports;

use App\Models\Umat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UmatExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Umat::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Umat',
            'Nama Baptis',
            'Email Umat',
            'Password',
            'Tanggal Lahir',
            'Wilayah',
            'Lingkungan',
            'Nomor HP Umat',
            'Alamat',
            'Status',
            'Slug',
            'Created At',
            'Updated At',
        ];
    }
}
