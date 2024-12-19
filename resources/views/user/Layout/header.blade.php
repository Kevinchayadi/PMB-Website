<link rel="stylesheet" href="{{ asset('css/header.css') }}">
<div
    class="header navbar navbar-expand-md px-3 pe-0 fixed-top {{ (Route::is('visiMisi') or Route::is('sejarah') or Route::is('doa') or Route::is('fasilitas') or Route::is('pastor') or Route::is('kegiatan')) ? '' : 'shadow-sm border-bottom' }}">
    <div class="left row col-lg-3 col-12">
        {{-- button --}}
        <button class="navbar-toggler col-2 h-50 my-auto mx-1" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Logo --}}
        <div class="logo col-3 my-auto">
            <img class="w-100 h-auto" src="{{ asset('picture/Logo Paroki baru 2.png') }}" alt="">
        </div>
        <div class="title align-self-center col-lg-9 col-7 row pe-0">

            {{-- Nama gereja --}}
            <div class="col-12 px-0">
                <div class="name">
                    <div class="fs-6 fw-bold">Gereja St. Petrus & Paulus</div>
                </div>
                <div class="address">
                    <div class="fs-6">Paroki Mangga Besar</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Navigation --}}
    <div class="middle col-6">
        <div class="{{ Route::is('umat.login') or (Route::is('umat.register') ? 'd-none' : '') }} align-self-center justify-content-center collapse navbar-collapse"
            id="navbarNav">
            <ul class="navbar-nav fs-6">

                @if (Auth::check())
                    {{-- User --}}
                    <li class="nav-item py-2 fw-bolder d-lg-none d-block">
                        Halo, <span class="text-primary">Ucok Subejo</span>
                    </li>

                    {{-- Dashboard --}}
                    <li class="nav-item hvr-float">
                        <a class="nav-link {{ Route::is('dashboard') ? 'text-secondary' : 'text-primary' }} me-2"
                            href="/dashboard">Dashboard</a>
                    </li>
                @endif

                {{-- Home --}}
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('home') ? 'text-secondary' : 'text-primary hvr-float' }} me-2"
                        href="/home">Home</a>
                </li>

                {{-- Profile --}}
                <li class="nav-item">
                    <a class="nav-link {{ (Route::is('visiMisi') or Route::is('sejarah') or Route::is('doa') or Route::is('fasilitas') or Route::is('pastor') or Route::is('kegiatan')) ? 'text-secondary' : 'text-primary hvr-float' }} me-2"
                        href="/profile/visiMisi">Profil</a>
                </li>

                {{-- Jadwal --}}
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('jadwal') ? 'text-secondary' : 'text-primary hvr-float' }} me-2"
                        href="/jadwal">Jadwal</a>
                </li>

                {{-- Layanan --}}
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('layanan') ? 'text-secondary' : 'text-primary hvr-float' }} me-2"
                        href="/layanan">Layanan</a>
                </li>

                {{-- Hubungi kami --}}
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('hubungi') ? 'text-secondary' : 'text-primary hvr-float' }}"
                        href="/hubungi">Hubungi Kami</a>
                </li>

                @if (Auth::check())
                    {{-- logout --}}
                    <li class="nav-item d-lg-none d-block">
                        <a class="nav-link text-primary" href="/#">Keluar</a>
                    </li>
                @else
                    <li class="nav-item d-lg-none d-block">
                        <a class="nav-link text-primary" href="/login">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>

    {{-- user --}}
    @if (Auth::check())
        <div class="right col-3">
            <div class="collapse navbar-collapse row justify-content-center">
                <div class="username col-5 px-0 fw-bolder">
                    Halo,<span class="ms-1 text-primary">{{ Auth::guard('web')->user()->nama_umat }}  </span>
                </div>

                <div class="logoutIcon col-2 px-0">
                    <a class="icon-link icon-link-hover text-dark text-decoration-none" href="/logout">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#000"
                            class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                            <path fill-rule="evenodd"
                                d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                        </svg>
                        Keluar
                    </a>
                </div>

            </div>
        </div>
    @else
        <div class="col-3 d-lg-block d-none text-end">
            <li class="hvr-float">
                <a class="nav-link text-primary" href="/login">Login</a>
            </li>
        </div>
    @endif
</div>
