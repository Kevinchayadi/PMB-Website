<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Acara;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(umat_seeder::class);
        $this->call(admin_seeder::class);
        $this->call(romo_seeder::class);
        $this->call(acara_seeder::class);
        $this->call(doa_seeder::class);
        $this->call(hightlight_seeder::class);
        $this->call(article_seeder::class);
        $this->call(dokumentasi_seeder::class);


       
    }
}
