<link rel="stylesheet" href="{{ asset('css/card.css') }}">

<div class="container">
    <div class="card" style="width: 100%;">
        <img src="{{ asset('picture/Gereja.jpg') }}" class="card-img-top" alt="...">
    </div>
    <div class="w-lg-50 w-100 box-shadow">
        <ul class="nav d-flex fs-6">

            {{-- Profil Gereja --}}
            <li class="nav-item">
                <a class="nav-link {{ Route::is('profile') ? 'text-decoration-underline decoration-secondary' : 'text-primary' }} me-2"
                    href="/profile/profile">Profil Gereja</a>
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
