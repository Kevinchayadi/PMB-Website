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
        <div class="col-4">
            <div class="pelayanan py-5 px-3">
                <div class="h4 text-white">Pelayanan</div>
                <p><a class="link-opacity-100 text-white" href="#">Hubungi Kami</a></p>
            </div>
        </div>

        <div class="col-4 px-3">
            <div class="agenda-paroki py-5 px-3">
                <div class="h4 text-white">Agenda Paroki</div>
                <p><a class="link-opacity-100 text-white" href="#">Cek informasi terbaru di sini</a></p>
            </div>
        </div>

        <div class="col-4">
            <div class="mari-ikut-terlibat py-5 px-3">
                <div class="h4 text-white">Mari ikut terlibat</div>
                <p><a class="link-opacity-100 text-white" href="#">Cek di sini</a></p>
            </div>
        </div>
    </div>

    {{-- Jadwal dan artikel --}}
    <div class="section-2 d-flex">
        <div class="col-8 ps-3 pe-4">
            <div class="head-section d-flex justify-content-between align-content-center">
                <div class="h3">Jadwal Misa</div>
                <a class="nav-link h5" href="#">Lihat semua jadwal</a>
            </div>
            <hr>
        </div>
        <div class="col-4 pe-3">
            <div class="head-section d-flex justify-content-between align-content-center">
                <div class="h3">Artikel</div>
                <a class="nav-link h5" href="#">Lihat semua artikel</a>
            </div>
            <hr>
        </div>
    </div>

@endsection
