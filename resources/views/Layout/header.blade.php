<link rel="stylesheet" href="{{ asset('css/header.css') }}">
<div class="header navbar navbar-expand-md px-3">
    <div class="left row">
        <div class="logo col-lg-4 col-4">
            <img class="img-fluid" src="{{ asset('picture/Logo Paroki baru 2.png') }}" alt="">
        </div>
        <div class="title align-self-center col-lg-7 col-8 row">
            <div class="col-lg-12 col-9">
                <div class="name">
                    <div class="fs-5 fw-bold">Gereja St. Petrus & Paulus</div>
                </div>
                <div class="address">
                    <div class="fs-6">Paroki Mangga Besar</div>
                </div>
            </div>
            <button class="navbar-toggler col-3 my-auto" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
    <div class="right align-self-center collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav fs-6">
            <li class="nav-item {{ request()->is('home') ? 'active' : '' }}">
                <a class="nav-link text-primary me-2" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-primary me-2" href="#">Profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-primary me-2" href="#">Jadwal</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-primary me-2" href="#">Layanan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-primary" href="#">Hubungi Kami</a>
            </li>
        </ul>
    </div>
</div>
