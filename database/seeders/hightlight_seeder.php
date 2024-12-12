<?php

namespace Database\Seeders;

use App\Models\Hightlight;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class hightlight_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hightlight::create([
            'nama' => 'highlight1',
            'path' => 'storage/img/highlight1.jpg', 
            'id_admin' => 1,  
        ]);

        Hightlight::create([
            'nama' => 'highlight2',
            'path' => 'storage/img/highlight2.jpg',
            'id_admin' => 1,
        ]);

        Hightlight::create([
            'nama' => 'highlight3',
            'path' => 'storage/img/highlight3.jpg',
            'id_admin' => 1,
        ]);

        Hightlight::create([
            'nama' => 'promosi',
            'path' => 'storage/img/promosi.jpg',
            'id_admin' => 1,
        ]);

        Hightlight::create([
            'nama' => 'event',
            'path' => 'storage/img/event.jpg',
            'id_admin' => 1,
        ]);
    }
}
