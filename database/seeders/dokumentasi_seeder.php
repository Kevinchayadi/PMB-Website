<?php

namespace Database\Seeders;

use App\Models\Acara;
use App\Models\Documentation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class dokumentasi_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $layanan = Acara::all();

        // Loop untuk setiap acara dan membuat dokumentasi
        foreach ($layanan as $acara) {
            Documentation::create([
                'nameDocumentation' => $acara->nama_acara . '.jpg', 
                'id_acara' => $acara->id_acara, 
            ]);
        }
    }
}
