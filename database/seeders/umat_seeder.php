<?php

namespace Database\Seeders;

use App\Exports\UmatExport;
use App\Models\Umat;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class umat_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    //     $faker = Faker::create('id_ID'); // Gunakan locale Indonesia

    //     // Membuat 1000 data umat
    //     foreach (range(1, 10000) as $index) {
    //         Umat::create([
    //             'nama_umat' => $faker->name, // Nama umat acak
    //             'nama_baptis' => $faker->firstName, // Nama baptis acak
    //             'email_umat' => $faker->unique()->safeEmail, // Email acak yang unik
    //             'password' => Hash::make('12345678'), // Password default
    //             'ttl_uamt' => $faker->date('Y-m-d', '2003-01-01'), // Tanggal lahir acak
    //             'Wilayah' => $faker->randomElement(['A', 'B', 'C']), // Pilihan acak untuk Wilayah
    //             'lingkungan' => $faker->randomElement(['Lingkungan 1', 'Lingkungan 2', 'Lingkungan 3']), // Lingkungan acak
    //             'nomorhp_umat' => $faker->phoneNumber, // Nomor telepon acak
    //             'alamat' => $faker->address, // Alamat acak
    //             'status' => $faker->randomElement(['Aktif', 'Tidak Aktif']), // Status acak
    //             'slug' => $faker->slug, // Slug acak
    //         ]);
    //     }
    //     $this->command->info('Umat data has been seeded successfully!');

    //     // Export data ke Excel
        // Excel::store(new UmatExport, 'excelData/umat6.xlsx');
    // }

        // Tentukan path file Excel
        $filePath = storage_path('app/public/excelData/umat2.xlsx'); 
        Log::info('File path: ' . $filePath);

        $excelData = Excel::toArray([], $filePath)[0];

       
        foreach ($excelData as $index => $row) {

           
            Umat::create([
                'nama_umat' => $row[1],
                'nama_baptis' => $row[2],
                'email_umat' => $row[4],
                'password' => Hash::make("12345678"),
                'ttl_umat' => $row[5],
                'Wilayah' => $row[6],
                'lingkungan' => $row[7],
                'nomorhp_umat' => $row[8],
                'alamat' => $row[9],
                'status' => $row[10],

            ]);
        }

        $this->command->info('Umat data has been seeded successfully!');
    }
    
}
