<?php

namespace Database\Seeders;

use App\Models\Acara;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class acara_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $acaraGereja = [
            [
                'nama_acara' => 'Misa',
                'deskripsi_acara' => 'Misa adalah perayaan Ekaristi yang dilakukan oleh umat Katolik untuk merayakan kehidupan, kematian, dan kebangkitan Yesus Kristus. Dalam Misa, umat menyatukan diri dalam doa, pembacaan Kitab Suci, dan penerimaan Tubuh dan Darah Kristus sebagai sakramen utama dalam hidup beriman.',
                'tipe_acara' => 'Liturgi',
            ],
            [
                'nama_acara' => 'Komuni Pertama',
                'deskripsi_acara' => 'Komuni Pertama adalah sakramen yang diberikan kepada anak-anak atau umat yang pertama kali menerima Tubuh dan Darah Kristus. Acara ini merupakan salah satu sakramen penting dalam Gereja Katolik, yang menandai pertumbuhan iman anak-anak dalam kehidupan gereja dan pengakuan mereka sebagai bagian dari tubuh Kristus.',
                'tipe_acara' => 'Sakramen',
            ],
            [
                'nama_acara' => 'Sakramen Baptis',
                'deskripsi_acara' => 'Baptis adalah sakramen pertama yang diberikan kepada umat baru, yang menandakan kelahiran kembali dalam kehidupan Kristiani. Melalui air baptisan, seseorang dibersihkan dari dosa asal dan diterima sebagai bagian dari keluarga Allah, membuka pintu bagi penerimaan sakramen-sakramen berikutnya.',
                'tipe_acara' => 'Sakramen',
            ],
            [
                'nama_acara' => 'Sakramen Tobat',
                'deskripsi_acara' => 'Sakramen Tobat, atau yang dikenal juga dengan nama Sakramen Pengakuan Dosa, adalah sakramen yang memberikan kesempatan bagi umat untuk mengakui dosa-dosa mereka di hadapan seorang imam dan menerima pengampunan dari Allah. Sakramen ini bertujuan untuk mendamaikan umat dengan Tuhan dan memperbarui hidup rohani mereka.',
                'tipe_acara' => 'Sakramen',
            ],
            [
                'nama_acara' => 'Krismasi',
                'deskripsi_acara' => 'Krismasi adalah sakramen penguatan iman yang diberikan kepada umat Katolik setelah mereka menerima sakramen Baptis. Dalam sakramen ini, minyak krisma dioleskan pada dahi umat sebagai tanda penerimaan Roh Kudus yang membimbing mereka untuk hidup sebagai saksi Kristus di dunia.',
                'tipe_acara' => 'Sakramen',
            ],
            [
                'nama_acara' => 'Pernikahan',
                'deskripsi_acara' => 'Pernikahan adalah sakramen yang menyatukan dua orang dalam ikatan cinta dan komitmen di hadapan Tuhan. Dalam pernikahan gereja, pasangan diingatkan akan makna cinta sejati, kesetiaan, dan saling mendukung dalam perjalanan hidup bersama, dengan Tuhan sebagai pusat dari hubungan mereka.',
                'tipe_acara' => 'Sakramen',
            ],
            [
                'nama_acara' => 'Pengurapan Orang Sakit',
                'deskripsi_acara' => 'Sakramen Pengurapan Orang Sakit adalah sakramen yang diberikan kepada umat yang sedang menderita penyakit serius atau saat menghadapi ajal. Melalui pengurapan minyak suci, umat menerima kekuatan Roh Kudus untuk menguatkan iman mereka dan, jika Tuhan menghendaki, memberikan kesembuhan atau ketenangan dalam menghadapi penderitaan.',
                'tipe_acara' => 'Sakramen',
            ],
        ];

        // Menggunakan Eloquent untuk memasukkan data
        foreach ($acaraGereja as $acara) {
            Acara::create($acara);
        }
    }
}
