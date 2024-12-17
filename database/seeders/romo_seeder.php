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
        Romo::create([
            'nama_romo' => 'CH. Triyudo Prastowo, SJ',
            'slug' => 'ch-triyudo-prastowo-sj',
            'DOB_romo' => '1985-05-10',
            'tempat_lahir' => 'Yogyakarta',
            'jabatan' => 'Pastor Paroki',
            'Pengalaman' => 'Pengalaman pelayanan di beberapa paroki di Yogyakarta dan Jakarta, aktif dalam kegiatan sosial dan pendidikan.',
            'nomorhp_romo' => '081234567890',
            'path' => 'ch-triyudo-prastowo-sj.jpg',
        ]);

        Romo::create([
            'nama_romo' => 'Chris Purba, SJ (Romo Tamu)',
            'slug' => 'chris-purba-sj-romo-tamu',
            'DOB_romo' => '1978-09-15',
            'tempat_lahir' => 'Medan',
            'jabatan' => 'Romo Tamu',
            'Pengalaman' => 'Pengalaman pelayanan di beberapa paroki di Sumatera dan Jawa, ahli dalam bidang pengajaran iman.',
            'nomorhp_romo' => '082345678901',
            'path' => 'chris-purba-sj-romo-tamu.jpg',
        ]);

        Romo::create([
            'nama_romo' => 'Mikael Irwan Susiananta, SJ',
            'slug' => 'mikael-irwan-susiananta-sj',
            'DOB_romo' => '1990-11-20',
            'tempat_lahir' => 'Jakarta',
            'jabatan' => 'Pastor Paroki',
            'Pengalaman' => 'Aktif dalam pelayanan di paroki Jakarta dan pelayanan muda-mudi. Berfokus pada pembinaan iman remaja.',
            'nomorhp_romo' => '083456789012',
            'path' => 'mikael-irwan-susiananta-sj.jpg',
        ]);

        Romo::create([
            'nama_romo' => 'Agustinus Purwantoro, SJ',
            'slug' => 'agustinus-purwantoro-sj',
            'DOB_romo' => '1982-03-30',
            'tempat_lahir' => 'Semarang',
            'jabatan' => 'Pastor Paroki',
            'Pengalaman' => 'Berpengalaman dalam pelayanan di berbagai paroki, khususnya dalam bidang liturgi dan pembinaan komunitas.',
            'nomorhp_romo' => '085123456789',
            'path' => 'agustinus-purwantoro-sj.jpg',
        ]);

        // Additional example Romos with realistic names and information

        Romo::create([
            'nama_romo' => 'Santo Yohanes Paulus II, SJ',
            'slug' => 'santo-yohanes-paulus-ii-sj',
            'DOB_romo' => '1952-10-28',
            'tempat_lahir' => 'Surabaya',
            'jabatan' => 'Bishop',
            'Pengalaman' => 'Pengalaman panjang dalam pelayanan gereja, pendampingan umat, dan pengembangan komunitas gereja.',
            'nomorhp_romo' => '087654321987',
            'path' => 'santo-yohanes-paulus-ii.jpg',
        ]);

        Romo::create([
            'nama_romo' => 'Franciscus Xaverius, SJ',
            'slug' => 'franciscus-xaverius-sj',
            'DOB_romo' => '1975-06-01',
            'tempat_lahir' => 'Bandung',
            'jabatan' => 'Pastor di Paroki St. Antonius',
            'Pengalaman' => 'Telah melayani di beberapa paroki, terlibat aktif dalam pendidikan iman dan kegiatan sosial gereja.',
            'nomorhp_romo' => '081234567891',
            'path' => 'franciscus-xaverius-sj.jpg',
        ]);

        Romo::create([
            'nama_romo' => 'Kornelius, SJ',
            'slug' => 'kornelius-sj',
            'DOB_romo' => '1988-02-12',
            'tempat_lahir' => 'Makassar',
            'jabatan' => 'Pastor Pembantu Paroki',
            'Pengalaman' => 'Menjadi bagian dalam pelayanan di gereja besar dan memimpin berbagai kegiatan rohani di kawasan Timur Indonesia.',
            'nomorhp_romo' => '089876543210',
            'path' => 'kornelius-sj.jpg',
        ]);
    }

    
}
