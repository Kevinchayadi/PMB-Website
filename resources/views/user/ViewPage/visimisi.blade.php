<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@extends('user.Layout.profileTemplate')
@section('title', 'Profile')
@section('content')
    {{-- Sejarah --}}
    <div class="fs-4 fw-bolder ps-2 text-primary">Sejarah Gereja</div>
    <div class="row mx-auto mb-3">
        <div class="col-lg-6 col-12 px-2 mb-2">
            <div class="fs-4 fw-bolder">Gereja Santo Petrus Paulus</div>
            <div class="fs-5 desc text-justify">Gereja Santo Petrus dan Paulus Paroki Mangga Besar terletak di Jakarta,
                Indonesia, dan
                merupakan salah satu gereja tertua di daerah tersebut. Didirikan pada masa kolonial Belanda, gereja ini
                awalnya melayani komunitas Katolik kecil yang terdiri dari penduduk lokal dan orang-orang Eropa yang tinggal
                di wilayah Batavia. Seiring berjalannya waktu, gereja ini mengalami perkembangan yang signifikan,
                beradaptasi dengan perubahan sosial dan budaya yang terjadi di sekitarnya. Arsitektur gereja ini
                mencerminkan perpaduan gaya Eropa klasik dengan elemen lokal, dan menjadi saksi bisu perjalanan sejarah
                serta pertumbuhan komunitas Katolik di daerah Mangga Besar. Gereja ini terus berfungsi sebagai pusat
                spiritual dan sosial, menyelenggarakan berbagai kegiatan keagamaan dan komunitas yang memperkuat ikatan
                antar umat.</div>
        </div>
        <div class="col-lg-6 col-12 px-2 mb-2">
            <div class="bg-primary p-2 rounded-3 shadow-lg mb-4">
                <img src="{{ asset('picture/Gereja.jpg') }}" class="img-fluid rounded-2" alt="">
            </div>
            <div class="bg-primary p-2 rounded-3 shadow-lg">
                <img src="{{ asset('picture/Gereja.jpg') }}" class="img-fluid rounded-2" alt="">
            </div>
        </div>
    </div>
    <div class="row mx-auto mb-3 justify-content-center">
        <div class="col-lg-6 col-6 px-2 mb-2 hvr-shrink">
            <div class="card bg-primary rounded-3 shadow-lg" data-bs-toggle="collapse" data-bs-target="#collapse-sejarah-1">
                <img src="{{ asset('picture/Gereja.jpg') }}" class="card-img-top h-100" alt="...">
                <div class="card-body">
                    <div class="text-center">
                        <div class="fs-4 fw-bolder text-white">1940</div>
                        <div class="fs-5 fw-bolder text-white mb-3">Peresmian</div>
                    </div>
                    <div class="collapse text-white text-justify fs-5" id="collapse-sejarah-1">
                        Pembangunan gereja ini dimulai pada tahun 1900an, dan resmi didirikan pada 3 Januari 1940.
                        Arsitektur gereja mengadopsi gaya pabrik es, yang mencerminkan keindahan dan keanggunan tradisi
                        Katolik. Gereja ini menjadi tempat ibadah yang ramai, di mana berbagai kegiatan liturgi dan pastoral
                        berlangsung, termasuk misa mingguan, sakramen, dan pertemuan komunitas.
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-6 px-2 mb-2 hvr-shrink">
            <div class="card bg-primary rounded-3 shadow-lg" data-bs-toggle="collapse" data-bs-target="#collapse-sejarah-2">
                <img src="{{ asset('picture/Gereja.jpg') }}" class="card-img-top h-100" alt="...">
                <div class="card-body">
                    <div class="text-center">
                        <div class="fs-4 fw-bolder text-white">1941 - 2025</div>
                        <div class="fs-5 fw-bolder text-white mb-3">Perkembangan</div>
                    </div>
                    <div class="collapse text-white text-justify fs-5" id="collapse-sejarah-2">
                        Seiring dengan perkembangan zaman, Gereja Santo Petrus dan Paulus terus beradaptasi untuk memenuhi
                        kebutuhan umatnya. Berbagai fasilitas seperti Gedung Karya Pastoral, ruang kegiatan, dan pieta telah
                        ditambahkan untuk mendukung kegiatan rohani dan sosial di kalangan jemaat.

                        Gereja ini bukan hanya sebagai tempat beribadah, tetapi juga berperan aktif dalam pelayanan sosial
                        dan kegiatan komunitas, membantu mereka yang membutuhkan dan memperkuat rasa kebersamaan antar umat.
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-6 px-2 mb-2 hvr-shrink">
            <div class="card bg-primary rounded-3 shadow-lg" data-bs-toggle="collapse" data-bs-target="#collapse-sejarah-3">
                <img src="{{ asset('picture/Gereja.jpg') }}" class="card-img-top h-100" alt="...">
                <div class="card-body">
                    <div class="text-center">
                        <div class="fs-4 fw-bolder text-white">2025</div>
                        <div class="fs-5 fw-bolder text-white mb-3">Saat Ini</div>
                    </div>
                    <div class="collapse text-white text-justify fs-5" id="collapse-sejarah-3">
                        Hingga saat ini, Gereja Santo Petrus dan Paulus Paroki Mangga Besar tetap menjadi salah satu
                        landmark penting di Jakarta, menjadi simbol iman dan pelayanan bagi umat Katolik.
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Visi dan Misi --}}
    <div class="fs-4 fw-bolder ps-2 text-primary">Visi & Misi Gereja</div>
    <div class="row mb-3 mx-auto">
        <div class="left col-lg-6 col-12 p-2 hvr-shrink">
            <div class="bg-primary rounded-3 shadow-lg p-2" data-bs-toggle="collapse" data-bs-target="#collapse-visi"
                aria-expanded="false" aria-controls="collapse">
                <img src="{{ asset('picture/Gereja.jpg') }}" alt="" class="img-thumbnail">
                <div class="title fw-bolder fs-5 text-white text-center">Visi</div>
                <div class="collapse text-white text-justify fs-5" id="collapse-visi">
                    Menjadi komunitas umat yang hidup dalam kasih Kristus, berkomitmen untuk berbagi berita baik dan
                    melayani sesama, serta menjadi garam dan terang di tengah masyarakat.
                </div>
            </div>
        </div>

        <div class="right col-lg-6 col-12 p-2 hvr-shrink">
            <div class="bg-primary rounded-3 shadow-lg p-2" data-bs-toggle="collapse" data-bs-target="#collapse-misi"
                aria-expanded="false" aria-controls="collapse">
                <img src="{{ asset('picture/Gereja.jpg') }}" alt="" class="img-thumbnail">
                <div class="title fw-bolder fs-5 text-white text-center">Misi</div>
                <div class="collapse text-white fs-5" id="collapse-misi">
                    <ul class="text-justify ps-0">
                        <li class="list-group-item">
                            <strong>Menggali dan Mendalami Iman:</strong>
                            <p class="mb-0">Mendorong umat untuk memperdalam iman melalui kegiatan liturgi, sakramen, dan
                                pembelajaran Alkitab secara berkala.</p>
                        </li>
                        <br>
                        <li class="list-group-item">
                            <strong>Pelayanan dan Kepedulian Sosial:</strong>
                            <p class="mb-0">Mengadakan berbagai program sosial yang peduli terhadap kebutuhan masyarakat
                                sekitar, serta mendukung umat yang kurang mampu.</p>
                        </li>
                        <br>
                        <li class="list-group-item">
                            <strong>Pendidikan dan Pembinaan:</strong>
                            <p class="mb-0">Menyelenggarakan kegiatan pendidikan dan pembinaan bagi semua golongan umur,
                                agar setiap individu berkembang secara spiritual dan sosial.</p>
                        </li>
                        <br>
                        <li class="list-group-item">
                            <strong>Partisipasi dan Kerjasama:</strong>
                            <p class="mb-0">Mengajak umat untuk aktif terlibat dalam pelayanan gereja dan komunitas,
                                serta
                                membangun kerjasama yang baik antar paroki dan institusi lain.</p>
                        </li>
                        <br>
                        <li class="list-group-item">
                            <strong>Pemberdayaan Umat:</strong>
                            <p class="mb-0">Memberikan kesempatan bagi umat untuk berkontribusi dalam berbagai pelayanan
                                yang ada, serta menghargai setiap peran yang dimainkan dalam komunitas gereja.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
