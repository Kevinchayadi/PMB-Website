<link rel="stylesheet" href="{{ asset('css/card.css') }}">

<div class="card" style="width: 100%;">
    <img src="{{ asset('picture/Gereja.jpg') }}" class="card-img-top" alt="...">
    <div class="card-body rounded-top">
        <ul class="nav row col-lg-8 col-12 fs-6">

            {{-- Profil Gereja --}}
            <li class="nav-item col-lg-2 col-4">
                <a class="nav-link {{ Route::is('profile') ? 'text-decoration-underline decoration-secondary' : 'text-primary' }} me-2"
                    href="/profile/profile">Profil Gereja</a>
            </li>

            {{-- Sejarah Gereja --}}
            <li class="nav-item col-lg-2 col-4">
                <a class="nav-link {{ Route::is('sejarah') ? 'text-primary text-decoration-underline decoration-secondary' : 'text-primary' }} me-2"
                    href="/profile/sejarah">Sejarah Gereja</a>
            </li>

            {{-- Doa Paroki --}}
            <li class="nav-item col-lg-2 col-4">
                <a class="nav-link {{ Route::is('jadwal') ? 'text-primary text-decoration-underline decoration-secondary' : 'text-primary' }} me-2"
                    href="/profile/doa">Doa Paroki</a>
            </li>

            {{-- Fasilitas --}}
            <li class="nav-item col-lg-2 col-4">
                <a class="nav-link {{ Route::is('fasilitas') ? 'text-primary text-decoration-underline decoration-secondary' : 'text-primary' }} me-2"
                    href="/profile/fasilitas">Fasilitas</a>
            </li>

            {{-- Pastor Paroki --}}
            <li class="nav-item col-lg-2 col-4">
                <a class="nav-link {{ Route::is('pastor') ? 'text-primary text-decoration-underline decoration-secondary' : 'text-primary' }}"
                    href="/profile/pastor">Pastor
                    Paroki</a>
            </li>

            {{-- Kegiatan --}}
            <li class="nav-item col-lg-2 col-4">
                <a class="nav-link {{ Route::is('kegiatan') ? 'text-primary text-decoration-underline decoration-secondary' : 'text-primary' }}"
                    href="/profile/kegiatan">Kegiatan</a>
            </li>
    </div>
</div>
