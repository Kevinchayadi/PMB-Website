@extends('Layout.template')
@section('title', 'Home')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">

@section('content')

    {{-- Carousel --}}
    <div id="carouselExampleAutoplaying" class="carousel slide mb-10" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('picture/Carousel-1.png') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('picture/Carousel-2.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('picture/Carousel-3.png') }}" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    {{-- Banner atas --}}
    <div class="banner-top px-3 my-lg-4 mt-4 mb-2">
        <div class="content d-lg-flex d-block justify-content-between align-content-center py-4">
            <div class="text-white fs-4">Daftar Misa Online Melalui Website Belarasa</div>
            <div class="btn btn-outline-primary text-primary bg-white">
                <a href="" class="nav-link">Daftar Sekarang</a>
            </div>
        </div>
    </div>

    {{-- Kegiatan --}}
    <div class="section-1 row ps-lg-3 mb-4 pe-lg-2 pe-0 ps-2">

        {{-- Pelayanan --}}
        <div class="col-md-4 my-md-0 col-12 my-2">
            <div class="pelayanan py-5 px-3">
                <div class="h4 text-white">Pelayanan</div>
                <p><a class="link-opacity-100 text-white" href="#">Hubungi Kami</a></p>
            </div>
        </div>

        {{-- Agenda Paroki --}}
        <div class="col-md-4 px-3 my-md-0 col-12 my-2">
            <div class="agenda-paroki py-5 px-3">
                <div class="h4 text-white">Agenda Paroki</div>
                <p><a class="link-opacity-100 text-white" href="#">Cek informasi terbaru di sini</a></p>
            </div>
        </div>

        {{-- Mari Ikut Terlibat --}}
        <div class="col-md-4 my-md-0 col-12 my-2">
            <div class="mari-ikut-terlibat py-5 px-3">
                <div class="h4 text-white">Mari ikut terlibat</div>
                <p><a class="link-opacity-100 text-white" href="#">Cek di sini</a></p>
            </div>
        </div>
    </div>

    {{-- Jadwal & Artikel --}}
    <div class="section-2 row">
        <div class="left col-lg-8 col-12 mb-lg-0 mb-4 pe-0">

            {{-- Jadwal misa head --}}
            <div class="px-4">
                <div class="head-section d-flex justify-content-between">
                    <div class="align-self-center fs-5 fw-bolder">Jadwal Misa</div>
                    <a class="nav-link align-self-center text-primary fs-6" href="#">Lihat semua jadwal</a>
                </div>
                <hr>
            </div>

            {{-- Content --}}
            <div class="ms-3 row me-0">

                {{-- Looping --}}
                <div class="left-content text-gray px-2 align-self-center col-lg-2 col-3 flex-start">
                    <div class="d-flex justify-content-center">
                        <div class="align-self-center d-lg-block d-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#7A7A7A"
                                class="bi bi-calendar align-self-center fs-xl-3" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                            </svg>
                        </div>
                        <div class="h4 mt-lg-2 ms-lg-2 align-self-center">02</div>
                    </div>
                    <div class="h5 text-center">Januari</div>
                </div>
                <div class="right-content pe-2 border-start border-gray col-lg-10 col-9 row">
                    <div class="text align-self-center col-lg-9 col-12">
                        <div class="head fs-5">Hari Raya Penampakan Tuhan</div>
                        <div class="desc fs-6">Bacaan: Yes. 60:1-6; Mzm. 72:1-2,7-8,10-11,12-13; Ef. 3:2-3a,5-6; Mat.
                            2:1-12</div>
                        <div class="h6 text-gray">Minggu, 2 Januari 2022 pkl 07.30 WIB</div>
                    </div>
                    <div class="button align-self-center text-end col-lg-3 col-12">
                        <div class="btn btn-outline-primary text-primary bg-white w-100">
                            <a href="#" class="nav-link">Lihat Info</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Artikel --}}
        <div class="right col-lg-4 col-12 mb-lg-0 mb-4 pe-0">

            {{-- Artikel head --}}
            <div class="px-4">
                <div class="head-section d-flex justify-content-between">
                    <div class="align-self-center fs-5 fw-bolder">Artikel</div>
                    <a class="nav-link align-self-center text-primary fs-6" href="#">Lihat semua artikel</a>
                </div>
                <hr>
            </div>

            {{-- Content --}}
            <div class="right-content mx-4">
                <div class="head fs-5 text-gray">Apa Makna Natal Bagi Saya di saat seperti ini?</div>
                <div class="desc fs-6">Bulan Desember merupakan bulan yang paling ditunggu oleh banyak orang</div>
                <a class="nav-link text-primary" href="#">Selengkapnya</a>
            </div>
        </div>
    </div>

    {{-- Banner bawah --}}
    <div class="banner-bottom my-4">
        <a href= "https://youtube.com">
            <img class="object-fit-contain w-100" src="{{ asset('picture/Subscribe.png') }}" alt="">
        </a>
    </div>
@endsection
