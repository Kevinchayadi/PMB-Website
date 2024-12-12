<?php

namespace Database\Seeders;

use App\Models\Articel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class article_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = [
            [
                'title' => 'Makna Taubat dalam Ajaran Katolik',
                'slug' => 'makna-taubat-dalam-ajaran-katolik',
                'body' => 'Taubat adalah salah satu sakramen utama dalam kehidupan umat Katolik yang berfungsi untuk membersihkan jiwa dari dosa. Dalam ajaran Katolik, taubat merupakan langkah pertama dalam menerima pengampunan Tuhan setelah kita menyadari dan mengakui dosa-dosa kita. Taubat bukan hanya sekadar penyesalan atas dosa, tetapi juga sebuah perubahan hati dan komitmen untuk tidak mengulanginya. Ini adalah bentuk kesadaran bahwa dosa kita memisahkan kita dari Tuhan dan merusak hubungan kita dengan sesama. Dalam Kitab Suci, Tuhan selalu membuka tangan-Nya untuk menerima orang yang bertobat dengan hati yang tulus, seperti dalam perumpamaan Anak yang Hilang (Lukas 15:11-32), di mana sang ayah menyambut pulang anak yang sudah menyadari kesalahannya.',
                'additionalLink' => 'https://www.catholic.org/taubat',
                'id_admin' => 1,
            ],
            [
                'title' => 'Langkah-langkah Taubat yang Sejati',
                'slug' => 'langkah-langkah-taubat-yang-sejati',
                'body' => 'Taubat sejati melibatkan beberapa langkah penting yang harus kita lakukan dengan sungguh-sungguh. Langkah pertama adalah **penyesalan** atas dosa-dosa yang telah kita perbuat. Penyesalan ini harus datang dari hati yang tulus dan bukan hanya karena takut hukuman. Langkah kedua adalah **pengakuan dosa** di hadapan Tuhan, baik melalui doa pribadi maupun pengakuan kepada imam dalam sakramen rekonsiliasi. Pengakuan dosa adalah cara kita mengakui kesalahan kita dan meminta Tuhan untuk mengampuni kita. Langkah ketiga adalah **niat untuk tidak mengulanginya**, yang menunjukkan komitmen kita untuk hidup lebih sesuai dengan ajaran Kristus. Terakhir, langkah keempat adalah **memperbaiki hubungan dengan sesama** yang telah kita sakiti. Taubat yang sejati menghasilkan perubahan dalam hidup kita, dan kita mulai menjalani kehidupan yang lebih penuh kasih dan pengampunan.',
                'additionalLink' => 'https://www.catholic.com/sejati-taubat',
                'id_admin' => 1,
            ],
            [
                'title' => 'Cara Menghindari Dosa dalam Kehidupan Sehari-hari',
                'slug' => 'cara-menghindari-dosa-dalam-kehidupan-sehari-hari',
                'body' => 'Menghindari dosa adalah bagian integral dari kehidupan Kristen yang murni. Setiap hari kita dihadapkan dengan berbagai godaan dan situasi yang dapat membawa kita pada dosa. Salah satu cara utama untuk menghindari dosa adalah dengan menjaga hubungan kita dengan Tuhan melalui **doa yang rutin**. Doa menguatkan kita dalam menghadapi godaan dan memberikan kita kekuatan untuk bertahan dalam kebenaran. Selain itu, kita perlu membekali diri dengan **Kitab Suci**. Firman Tuhan menjadi pedoman hidup yang memberi kita arahan dalam membuat keputusan yang benar. Sebagai orang Katolik, kita juga harus menjaga **hubungan yang baik dengan sesama** dan menghindari lingkungan yang dapat memicu dosa. Hal ini termasuk memilih teman yang membawa kita lebih dekat kepada Tuhan, menghindari situasi yang dapat menjerumuskan kita ke dalam dosa, dan selalu memperhatikan tindakan kita sehari-hari agar tetap selaras dengan ajaran Kristus.',
                'additionalLink' => 'https://www.catholic.org/menghindari-dosa',
                'id_admin' => 1,
            ],
            [
                'title' => 'Mengapa Dosa Adalah Penghalang antara Kita dan Tuhan?',
                'slug' => 'mengapa-dosa-adalah-penghalang-antara-kita-dan-tuhan',
                'body' => 'Dosa adalah penghalang yang memisahkan kita dari Tuhan. Ketika kita berdosa, kita menutup hati kita terhadap kasih dan rahmat Tuhan. Seperti yang dijelaskan dalam Yesaya 59:2, "Tetapi dosa-dosamu telah memisahkan kamu dari Tuhanmu, dan pelanggaranmu telah menyembunyikan wajah-Nya dari padamu, sehingga Ia tidak mendengarkan." Dosa menciptakan jurang antara kita dan Tuhan, dan tanpa pertobatan, kita tidak dapat merasakan hadirat-Nya dalam hidup kita. Taubat adalah cara kita menghapus penghalang ini dan membuka kembali pintu hubungan dengan Tuhan. Melalui sakramen pengakuan dosa, kita mendapatkan kesempatan untuk mengakui kesalahan kita dan menerima pengampunan dari Tuhan, yang dengan begitu memulihkan hubungan kita dengan-Nya.',
                'additionalLink' => 'https://www.catholic.com/dosa-penghalang',
                'id_admin' => 1,
            ],
            [
                'title' => 'Pentingnya Pengampunan dalam Taubat',
                'slug' => 'pentingnya-pengampunan-dalam-taubat',
                'body' => 'Pengampunan adalah inti dari taubat. Tanpa pengampunan, taubat tidak akan lengkap. Ketika kita mengakui dosa-dosa kita dan meminta Tuhan untuk mengampuni, kita juga dipanggil untuk mengampuni orang yang telah bersalah kepada kita. Dalam doa Bapa Kami, kita memohon kepada Tuhan, "Ampunilah kesalahan kami seperti kami pun mengampuni yang bersalah kepada kami." Dengan kata lain, kita tidak hanya membutuhkan pengampunan Tuhan, tetapi juga harus mengampuni sesama kita jika kita ingin menerima pengampunan-Nya. Pengampunan membawa kedamaian dalam hati, menyembuhkan luka emosional, dan menghilangkan rasa benci yang bisa menghalangi kita untuk mengalami kasih Tuhan dengan sepenuhnya.',
                'additionalLink' => 'https://www.catholic.com/pengampunan-taubat',
                'id_admin' => 1,
            ],
            [
                'title' => 'Kesalahan yang Perlu Dihindari Saat Bertobat',
                'slug' => 'kesalahan-yang-perlu-dihindari-saat-bertobat',
                'body' => 'Dalam proses taubat, kita harus menghindari beberapa kesalahan yang dapat menghambat pertobatan sejati. Salah satunya adalah **taubat yang tidak tulus**. Jika kita hanya merasa menyesal karena takut hukuman atau akibat buruk dari dosa kita, bukan karena kita benar-benar ingin berubah, maka taubat kita tidak akan berarti. Kesalahan lain adalah **menganggap ringan dosa** dan tidak benar-benar berusaha untuk mengubah perilaku. Taubat sejati memerlukan niat yang kuat untuk bertobat dan tidak kembali lagi ke dosa yang sama. Pengakuan dosa juga harus dilakukan dengan serius; jangan biarkan rasa malu atau kebanggaan menghalangi kita untuk datang kepada Tuhan dengan hati yang terbuka dan penuh penyesalan.',
                'additionalLink' => 'https://www.catholic.com/kesalahan-taubat',
                'id_admin' => 1,
            ],
            [
                'title' => 'Bagaimana Taubat Membawa Kedamaian dalam Hati',
                'slug' => 'bagaimana-taubat-membawa-kedamaian-dalam-hati',
                'body' => 'Taubat yang tulus membawa kedamaian yang luar biasa dalam hati. Ketika kita mengakui dosa-dosa kita dan menerima pengampunan Tuhan, kita merasa beban kita terangkat. Pikiran dan hati kita yang sebelumnya dipenuhi dengan rasa bersalah dan ketakutan, kini menjadi ringan. Dalam surat 1 Yohanes 1:9, kita diajarkan bahwa, "Jika kita mengaku dosa kita, maka Ia, yang setia dan adil, akan mengampuni dosa kita dan menyucikan kita dari segala kejahatan." Kedamaian ini bukan hanya berasal dari pengampunan Tuhan, tetapi juga dari proses penyembuhan jiwa kita yang terluka oleh dosa. Taubat memberi kita kesempatan untuk kembali ke jalan yang benar dan memperbaiki hubungan kita dengan Tuhan dan sesama.',
                'additionalLink' => 'https://www.catholic.com/kedamaian-taubat',
                'id_admin' => 1,
            ],
            [
                'title' => 'Mengapa Menghindari Dosa Adalah Tanggung Jawab Setiap Kristen',
                'slug' => 'mengapa-menghindari-dosa-adalah-tanggung-jawab-setiap-kristen',
                'body' => 'Sebagai orang Kristen, kita dipanggil untuk hidup sesuai dengan ajaran Kristus dan menghindari dosa. Dosa bukan hanya melanggar hukum Tuhan, tetapi juga merusak hubungan kita dengan Tuhan dan sesama. Menghindari dosa adalah cara kita menunjukkan penghormatan terhadap Tuhan dan ketaatan kepada kehendak-Nya. Sebagai pengikut Kristus, kita memiliki tanggung jawab untuk hidup dalam terang, menjauhi perbuatan gelap, dan menghindari segala bentuk dosa yang dapat mencemari hidup kita. Dosa bisa datang dalam berbagai bentuk, baik itu dosa kecil yang tampaknya tidak berbahaya atau dosa besar yang jelas-jelas melanggar perintah Tuhan. Oleh karena itu, kita harus terus waspada dan mengandalkan kekuatan Tuhan untuk melawan godaan-godaan yang ada di dunia ini.',
                'additionalLink' => 'https://www.catholic.com/tanggung-jawab-kristen',
                'id_admin' => 1,
            ],
            [
                'title' => 'Taubat: Jalan Menuju Pembaruan Hidup',
                'slug' => 'taubat-jalan-menuju-pembaruan-hidup',
                'body' => 'Taubat adalah jalan yang membawa kita kepada pembaruan hidup. Ketika kita bertobat, kita memberikan ruang bagi Tuhan untuk bekerja dalam hidup kita, mengubah hati kita, dan menyucikan pikiran serta tindakan kita. Taubat bukan hanya menghindari dosa, tetapi juga membuka diri untuk hidup dalam kasih, pengampunan, dan pelayanan kepada sesama. Pembaruan hidup dimulai dengan **penerimaan kasih Tuhan** dan dilanjutkan dengan **perubahan yang nyata** dalam cara kita berinteraksi dengan dunia sekitar kita. Seiring dengan pertumbuhan rohani, taubat membawa kita lebih dekat kepada Tuhan dan semakin membentuk kita menjadi pribadi yang lebih baik di hadapan-Nya.',
                'additionalLink' => 'https://www.catholic.com/taubat-pembaruan-hidup',
                'id_admin' => 1,
            ],
            [
                'title' => 'Cara Melawan Dosa dengan Kekuatan Doa',
                'slug' => 'cara-melawan-dosa-dengan-kekuatan-doa',
                'body' => 'Doa adalah senjata ampuh dalam melawan dosa. Ketika kita berdoa, kita menyerahkan hidup kita kepada Tuhan dan memohon kekuatan-Nya untuk mengatasi godaan dan godaan yang datang. Dalam doa, kita juga meminta hikmat untuk membuat keputusan yang benar dan menghindari godaan yang membawa kita ke dalam dosa. Doa yang konsisten, seperti doa pagi dan malam, serta doa-doa khusus yang memohon kekuatan dan pertolongan Tuhan, memberikan keteguhan dalam iman kita dan membentuk karakter kita untuk hidup sesuai dengan kehendak-Nya. Doa juga membawa kita lebih dekat dengan Tuhan dan memampukan kita untuk hidup dengan penuh kasih kepada sesama.',
                'additionalLink' => 'https://www.catholic.com/melawan-dosa-doa',
                'id_admin' => 1,
            ],
        ];

        // Menyisipkan artikel-artikel ke dalam tabel 'articels'
        foreach ($articles as $article) {
            Articel::create($article);
        }
    }
}
