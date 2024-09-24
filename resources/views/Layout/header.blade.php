<link rel="stylesheet" href="{{ asset('css/header.css') }}">
<div class="header navbar navbar-expand-md px-3">
    <div class="left row">

        {{-- Logo --}}
        <div class="logo col-lg-4 col-4">
            <img class="img-fluid" src="{{ asset('picture/Logo Paroki baru 2.png') }}" alt="">
        </div>
        <div class="title align-self-center col-lg-7 col-8 row">

            {{-- Nama gereja --}}
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

    {{-- Navigation --}}
    <div class="right align-self-center collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav fs-6">

            {{-- Home --}}
            <li class="nav-item">
                <a class="nav-link {{ Route::is('home') ? 'text-secondary' : 'text-primary' }} me-2"
                    href="/home">Home</a>
            </li>

            {{-- Profile --}}
            <li class="nav-item">
                <a class="nav-link {{ Route::is('profile') ? 'text-secondary' : 'text-primary' }} me-2"
                    href="/profile/profile">Profil</a>
            </li>

            {{-- Jadwal --}}
            <li class="nav-item">
                <a class="nav-link {{ Route::is('jadwal') ? 'text-secondary' : 'text-primary' }} me-2"
                    href="#">Jadwal</a>
            </li>

            {{-- Layanan --}}
            <li class="nav-item">
                <a class="nav-link {{ Route::is('layanan') ? 'text-secondary' : 'text-primary' }} me-2"
                    href="#">Layanan</a>
            </li>

            {{-- Hubungi kami --}}
            <li class="nav-item">
                <a class="nav-link {{ Route::is('hubungi') ? 'text-secondary' : 'text-primary' }}"
                    href="/hubungi">Hubungi Kami</a>
            </li>
        </ul>
    </div>
</div>
