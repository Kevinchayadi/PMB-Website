<?php

namespace Database\Seeders;

use App\Models\Romo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class romo_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run()
    {
        // Menggunakan Eloquent untuk memasukkan data
        Romo::create([
            'nama_romo' => 'CH. Triyudo Prastowo, SJ.',
        ]);

        Romo::create([
            'nama_romo' => 'Chris Purba, SJ (Romo Tamu)',
        ]);

        Romo::create([
            'nama_romo' => 'Mikael Irwan Susiananta, SJ',
        ]);

        Romo::create([
            'nama_romo' => 'Agustinus Purwantoro, SJ',
        ]);
    }
    
}
