<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @include('user.Layout.bootstrap')
    @include('user.Layout.font')
    <link rel="stylesheet" href="{{ asset('css/card.css') }}">
</head>

<body>
    @include('user.Layout.header')
    <div class="upper border-bottom sticky-top bg-white shadow-sm">
        <div class="w-100 box-shadow">
            <ul class="nav fs-6 w-auto overflow-x-auto d-relative flex-nowrap justify-content-center">

                {{-- Profil Gereja --}}
                <li class="nav-item ms-3">
                    <a class="nav-link {{ Route::is('visiMisi') ? 'text-primary text-decoration-underline decoration-secondary' : 'text-primary' }} me-2"
                        href="/profile/visiMisi">Visi & Misi Gereja</a>
                </li>

                {{-- Sejarah Gereja --}}
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('sejarah') ? 'text-primary text-decoration-underline decoration-secondary' : 'text-primary' }} me-2"
                        href="/profile/sejarah">Sejarah Gereja</a>
                </li>

                {{-- Doa Paroki --}}
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('doa') ? 'text-primary text-decoration-underline decoration-secondary' : 'text-primary' }} me-2"
                        href="/profile/doa">Doa Paroki</a>
                </li>

                {{-- Fasilitas --}}
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('fasilitas') ? 'text-primary text-decoration-underline decoration-secondary' : 'text-primary' }} me-2"
                        href="/profile/fasilitas">Fasilitas</a>
                </li>

                {{-- Pastor Paroki --}}
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('pastor') ? 'text-primary text-decoration-underline decoration-secondary' : 'text-primary' }}"
                        href="/profile/pastor">Pastor
                        Paroki</a>
                </li>

                {{-- Kegiatan --}}
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('kegiatan') ? 'text-primary text-decoration-underline decoration-secondary' : 'text-primary' }}"
                        href="/profile/kegiatan">Kegiatan</a>
                </li>
        </div>
    </div>
    <div class="container-fluid px-0">
        <div class="bottom row mx-auto h-100">
            <div class="col-2 border-end d-lg-block d-none">
                @include('user.Layout.leftpage')
            </div>
            <div class="col-lg-8 col-12 mt-3">
                @yield('content')
            </div>
            <div class="col-2 border-start d-lg-block d-none">
                @include('user.Layout.rightpage')
            </div>
        </div>
    </div>
    <script src="{{ asset('js/scroll.js') }}"></script>
</body>
<footer>
    @include('user.Layout.footer')
</footer>

</html>
