<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class EventDataSampleExport extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Tentukan jumlah data yang ingin di-generate
        //$totalRecords = rand(100, 200); 
        // Generate antara 100 hingga 200 data

        // Generate data dan simpan dalam array
        $data = [];

        for ($i = 0; $i < 100; $i++) {
            // Menyiapkan data untuk setiap baris
            $data[] = [
                'judul' => 'Religious Event ' . $faker->word, // Judul acak
                'id_romo' => rand(1, 7)+100, // id_romo antara 1-7
                'id_acara' => rand(1, 7)+230, // id_acara antara 1-7
                'id_doa' => rand(1, 2)+700, // id_doa antara 1-2
                'jadwal_transaction' => Carbon::now()->addDays(rand(1, 30))->format('Y-m-d H:i:s'), // Jadwal acak
                'deskripsi_transaksi' => $faker->sentence, // Deskripsi transaksi acak
            ];
        }

        // Sekarang ekspor data ke Excel
        Excel::store(new class($data) implements \Maatwebsite\Excel\Concerns\FromArray {
            private $data;
            
            public function __construct(array $data)
            {
                $this->data = $data;
            }

            public function array(): array
            {
                return $this->data;
            }
        }, 'acara_data.xlsx');
    }
}
