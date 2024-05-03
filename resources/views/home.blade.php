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

    {{-- Banner --}}
    <div class="banner px-3 my-4">
        <div class="content d-flex justify-content-between align-content-center py-4">
            <div class="h3 text-white">Daftar Misa Online Melalui Website Belarasa</div>
            <div class="btn btn-outline-primary text-primary bg-white">Daftar Sekarang</div>
        </div>
    </div>

    {{-- Kegiatan --}}
    <div class="section-1 d-flex justify-content-between px-3 mb-4">
        <div class="col-md-4">
            <div class="pelayanan py-5 px-3">
                <div class="h4 text-white">Pelayanan</div>
                <p><a class="link-opacity-100 text-white" href="#">Hubungi Kami</a></p>
            </div>
        </div>

        <div class="col-md-4 px-3">
            <div class="agenda-paroki py-5 px-3">
                <div class="h4 text-white">Agenda Paroki</div>
                <p><a class="link-opacity-100 text-white" href="#">Cek informasi terbaru di sini</a></p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="mari-ikut-terlibat py-5 px-3">
                <div class="h4 text-white">Mari ikut terlibat</div>
                <p><a class="link-opacity-100 text-white" href="#">Cek di sini</a></p>
            </div>
        </div>
    </div>

    {{-- Jadwal dan artikel --}}
    <div class="section-2 d-flex">
        <div class="left col-8">
            <div class="ps-3 pe-4">
                <div class="head-section d-flex justify-content-between">
                    <div class="h3 align-self-center">Jadwal Misa</div>
                    <a class="nav-link h5 align-self-center text-primary" href="#">Lihat semua jadwal</a>
                </div>
                <hr>
            </div>
            <div class="d-flex ps-3 pe-4">
                <div class="left-content text-gray col-1 align-self-center">
                    <div class="d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#7A7A7A"
                            class="bi bi-calendar align-self-center" viewBox="0 0 16 16">
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                        </svg>
                        <div class="h5 ms-2">02</div>
                    </div>
                    <div class="h5">Januari</div>
                </div>
                <div class="right-content d-flex ps-2 border-start border-gray">
                    <div class="text align-self-center">
                        <div class="h4 head">Hari Raya Penampakan Tuhan</div>
                        <div class="h6 desc">Bacaan: Yes. 60:1-6; Mzm. 72:1-2,7-8,10-11,12-13; Ef. 3:2-3a,5-6; Mat.
                            2:1-12</div>
                        <div class="h6 text-gray">Minggu, 2 Januari 2022 pkl 07.30 WIB</div>
                    </div>
                    <div class="button align-self-center">
                        <div class="btn btn-outline-primary text-primary bg-white">Daftar Sekarang</div>
                    </div>
                </div>
            </div>
        </div>


        <div class="right col-4 pe-4">
            <div class="head-section d-flex justify-content-between">
                <div class="h3 align-self-center">Artikel</div>
                <a class="nav-link h5 align-self-center text-primary" href="#">Lihat semua artikel</a>
            </div>
            <hr>
        </div>
    </div>
    </div>

    <div class="section-2-content col-8 ps-3 ps-3 d-flex border rounded-top">
        {{-- pake looping entar --}}

    </div>

@endsection
