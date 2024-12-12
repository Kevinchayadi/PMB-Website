<?php

namespace Database\Seeders;

use App\Models\Doa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class doa_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Doa::create([
            'nama_doa' => 'Doa untuk Kekuatan dalam Menghadapi Kesulitan',
            'deskripsi_doa' => 'Doa ini dipanjatkan untuk memohon kekuatan dan keteguhan iman dalam menghadapi tantangan hidup yang sulit.',
            'ayat_renungan' => 'Aku tahu, bahwa Engkau tidak akan meninggalkan aku dalam kesusahan ini, sebab Engkau adalah Tuhan yang selalu memberi pertolongan. — Mazmur 34:19',
            'isi_renungan' => 'Ketika menghadapi cobaan, kita sering merasa lemah dan tidak mampu menghadapinya. Namun, Firman Tuhan dalam Mazmur 34:19 mengingatkan kita bahwa Tuhan selalu dekat dengan kita, terutama di saat-saat kesulitan. Meskipun kita merasa sendirian atau tidak berdaya, Tuhan memberikan kekuatan dan penghiburan. Renungan ini mengajak kita untuk mengingat bahwa dalam setiap kesulitan, Tuhan hadir sebagai penolong yang setia, yang tidak pernah meninggalkan kita.',
            'ayat_tambahan' => 'Segala perkara dapat kutanggung di dalam Dia yang memberi kekuatan kepadaku. — Filipi 4:13'
        ]);

        // Data doa kedua: Doa untuk Mengalami Kasih Tuhan yang Tak Terbatas
        Doa::create([
            'nama_doa' => 'Doa untuk Mengalami Kasih Tuhan yang Tak Terbatas',
            'deskripsi_doa' => 'Doa ini mengajak kita untuk membuka hati dan menyadari betapa besar dan tak terhingga kasih Tuhan kepada kita.',
            'ayat_renungan' => 'Karena begitu besar kasih Allah akan dunia ini, sehingga Ia mengaruniakan Anak-Nya yang Tunggal, supaya setiap orang yang percaya kepada-Nya tidak binasa, melainkan beroleh hidup yang kekal. — Yohanes 3:16',
            'isi_renungan' => 'Kasih Tuhan kepada kita adalah kasih yang tidak terbatas, sebuah kasih yang tidak dapat diukur oleh ukuran manusia. Yohanes 3:16 menggambarkan betapa besar pengorbanan Tuhan yang mengaruniakan Anak-Nya, Yesus Kristus, untuk keselamatan umat manusia. Kasih Tuhan tidak memandang status atau dosa kita, tetapi selalu menawarkan pengampunan dan kehidupan yang kekal. Renungan ini mengajak kita untuk terus merenungkan kedalaman kasih Tuhan dan hidup dalam pengharapan bahwa kasih-Nya akan selalu menyertai kita, apapun yang kita alami.',
            'ayat_tambahan' => 'Aku telah mengasihi kamu dengan kasih yang kekal, sebab itu Aku melanjutkan kasih setia-Ku kepadamu. — Yeremia 31:3'
        ]);
    }
}
