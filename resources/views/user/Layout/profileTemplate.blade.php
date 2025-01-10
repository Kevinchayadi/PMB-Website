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
    <link rel="stylesheet" href="{{ asset('css/hover.css') }}">
</head>

<body>
    @include('user.Layout.header')
    <div class="upper border-bottom sticky-top bg-white shadow-sm">
        <div class="w-100 box-shadow overflow-auto">
            <ul class="nav fs-6 w-auto d-relative flex-nowrap justify-content-lg-center justify-content-start">

                {{-- Profil Gereja --}}
                <li class="nav-item ms-3">
                    <a class="nav-link {{ Route::is('visiMisi') ? 'text-primary text-decoration-underline decoration-secondary' : 'text-primary hvr-push' }} me-2"
                        href="/profil/visiMisi">Visi Misi & Sejarah Gereja</a>
                </li>

                {{-- Doa Paroki --}}
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('doa') ? 'text-primary text-decoration-underline decoration-secondary' : 'text-primary hvr-push' }} me-2"
                        href="/profil/doa">Doa Paroki</a>
                </li>

                {{-- Fasilitas --}}
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('fasilitas') ? 'text-primary text-decoration-underline decoration-secondary' : 'text-primary hvr-push' }} me-2"
                        href="/profil/fasilitas">Fasilitas</a>
                </li>

                {{-- Pastor Paroki --}}
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('pastor') ? 'text-primary text-decoration-underline decoration-secondary' : 'text-primary hvr-push' }}"
                        href="/profil/pastor">Pastor
                        Paroki</a>
                </li>

                {{-- Kegiatan --}}
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('kegiatan') ? 'text-primary text-decoration-underline decoration-secondary' : 'text-primary hvr-push' }}"
                        href="/profil/kegiatan">Kegiatan</a>
                </li>
        </div>
    </div>
    <div class="container d-flex justify-content-center px-0 bottom">
        <div class="col-lg-10 col-12 mt-2">
            @yield('content')
        </div>
    </div>
    @include('user.Layout.footer')
    <script src="{{ asset('js/scroll.js') }}"></script>
</body>

</html>
