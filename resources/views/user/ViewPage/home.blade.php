@extends('user.Layout.template')
@section('title', 'Home')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">

@section('content')
    <div class="container">
        {{-- Carousel --}}
        <div id="carouselExampleAutoplaying" class="carousel slide w-100 mx-auto mb-3" data-bs-ride="carousel">
            <div class="carousel-inner rounded-3 shadow-lg">
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
        <div class="card mx-auto col-12 mb-3 bg-dark rounded-3 shadow-lg d-lg-block d-none hvr-shrink">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('picture/Misa.jpg') }}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="content align-content-center py-4 fs-1 d-lg-block d-none">
                            <div class="text-secondary fw-bolder">Ikuti misa pekan ini</div>
                            <div class="btn btn-secondary text-dark">
                                <a href="" class="nav-link fs-6">Info lebih lanjut</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card bg-dark d-lg-none d-block mb-4 bg-dark rounded-3 shadow-lg">
            <img src="{{ asset('picture/Misa.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
                <div class="content col-12 align-content-center fs-4">
                    <div class="text-secondary fw-bolder">Ikuti misa pekan ini</div>
                    <div class="btn btn-secondary text-dark">
                        <a href="" class="nav-link fs-6 hvr-shrink">Info lebih lanjut</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Jadwal & Artikel --}}
        <div class="section-2 mb-4 pe-0">

            {{-- Jadwal misa head --}}
            <div class="head-section d-flex justify-content-between">
                <div class="align-self-center fs-4 fw-bolder">Jadwal Misa</div>
                <a class="nav-link align-self-center text-primary fs-6" href="/jadwal">Lihat semua jadwal</a>
            </div>
            <hr>

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
                        <div class="desc fs-6">Bacaan: <br>Yes. 60:1-6; <br>Mzm. 72:1-2,7-8,10-11,12-13; <br>Ef.
                            3:2-3a,5-6; <br>Mat.2:1-12</div>
                        <div class="h6 text-gray">Minggu, 2 Januari 2022 pkl 07.30 WIB</div>
                    </div>
                    <div class="button align-self-center text-end col-lg-3 col-12">
                        <div class="btn text-primary bg-white w-100 hvr-border-fade">
                            <a href="/jadwal/1" class="nav-link">Lihat Info</a>
                        </div>
                    </div>
                </div>
                <hr>

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
                        <div class="desc fs-6">Bacaan: <br>Yes. 60:1-6; <br>Mzm. 72:1-2,7-8,10-11,12-13; <br>Ef.
                            3:2-3a,5-6; <br>Mat.2:1-12</div>
                        <div class="h6 text-gray">Minggu, 2 Januari 2022 pkl 07.30 WIB</div>
                    </div>
                    <div class="button align-self-center text-end col-lg-3 col-12">
                        <div class="btn text-primary bg-white w-100 hvr-border-fade">
                            <a href="/jadwal/1" class="nav-link">Lihat Info</a>
                        </div>
                    </div>
                </div>
                <hr>

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
                        <div class="desc fs-6">Bacaan: <br>Yes. 60:1-6; <br>Mzm. 72:1-2,7-8,10-11,12-13; <br>Ef.
                            3:2-3a,5-6; <br>Mat.2:1-12</div>
                        <div class="h6 text-gray">Minggu, 2 Januari 2022 pkl 07.30 WIB</div>
                    </div>
                    <div class="button align-self-center text-end col-lg-3 col-12">
                        <div class="btn text-primary bg-white w-100 hvr-border-fade">
                            <a href="/jadwal/1" class="nav-link">Lihat Info</a>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </div>
        <div class="section-3 mb-lg-0 mb-4 pe-0">
            {{-- Artikel --}}

            <div class="head-section d-flex justify-content-between">
                <div class="align-self-center fs-4 fw-bolder">Artikel</div>
                <a class="nav-link align-self-center text-primary fs-6" href="/artikel">Lihat semua artikel</a>
            </div>
            <hr>

            {{-- Content --}}
            <div class="row px-2">
                <div class="col-4 px-2 mb-2 hvr-shrink">
                    <div class="card">
                        <img src="{{ asset('picture/Gereja.jpg') }}" class="card-img-top px-0" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Apa Makna Natal Bagi Saya di saat seperti ini?</h5>
                            <p class="card-text">ulan Desember merupakan bulan yang paling ditunggu oleh banyak orang...
                            </p>
                            <a href="/artikel/1" class="nav-link text-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-4 px-2 mb-2 hvr-shrink">
                    <div class="card">
                        <img src="{{ asset('picture/Gereja.jpg') }}" class="card-img-top px-0" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Apa Makna Natal Bagi Saya di saat seperti ini?</h5>
                            <p class="card-text">ulan Desember merupakan bulan yang paling ditunggu oleh banyak orang...
                            </p>
                            <a href="/artikel/1" class="nav-link text-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-4 px-2 mb-2 hvr-shrink">
                    <div class="card">
                        <img src="{{ asset('picture/Gereja.jpg') }}" class="card-img-top px-0" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Apa Makna Natal Bagi Saya di saat seperti ini?</h5>
                            <p class="card-text">ulan Desember merupakan bulan yang paling ditunggu oleh banyak orang...
                            </p>
                            <a href="/artikel/1" class="nav-link text-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-4 px-2 mb-2 hvr-shrink">
                    <div class="card">
                        <img src="{{ asset('picture/Gereja.jpg') }}" class="card-img-top px-0" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Apa Makna Natal Bagi Saya di saat seperti ini?</h5>
                            <p class="card-text">ulan Desember merupakan bulan yang paling ditunggu oleh banyak orang...
                            </p>
                            <a href="/artikel/1" class="nav-link text-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-4 px-2 mb-2 hvr-shrink">
                    <div class="card">
                        <img src="{{ asset('picture/Gereja.jpg') }}" class="card-img-top px-0" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Apa Makna Natal Bagi Saya di saat seperti ini?</h5>
                            <p class="card-text">ulan Desember merupakan bulan yang paling ditunggu oleh banyak orang...
                            </p>
                            <a href="/artikel/1" class="nav-link text-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-4 px-2 mb-2 hvr-shrink">
                    <div class="card">
                        <img src="{{ asset('picture/Gereja.jpg') }}" class="card-img-top px-0" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Apa Makna Natal Bagi Saya di saat seperti ini?</h5>
                            <p class="card-text">ulan Desember merupakan bulan yang paling ditunggu oleh banyak orang...
                            </p>
                            <a href="/artikel/1" class="nav-link text-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>


            {{-- Banner bawah --}}
            <div class="banner-bottom my-4 rounded-3 shadow-lg w-75 mx-auto">
                <a href= "https://youtube.com">
                    <img class="object-fit-contain w-100 rounded-3" src="{{ asset('picture/Subscribe.png') }}"
                        alt="">
                </a>
            </div>
        </div>
    </div>
@endsection
