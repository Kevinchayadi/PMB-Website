<link rel="stylesheet" href="asset('css/card.css')">

<div class="card" style="width: 100%;">
    <img src="{{ asset('picture/Gereja.jpg') }}" class="card-img-top" alt="...">
    <div class="card-body rounded-top">
        <ul class="nav d-flex fs-5 justify-content-center">

            {{-- Profil Gereja --}}
            <li class="nav-item">
                <a class="nav-link {{ Route::is('home') ? 'text-secondary' : 'text-primary' }} me-2"
                    href="/home">Profil Gereja</a>
            </li>

            {{-- Sejarah Gereja --}}
            <li class="nav-item">
                <a class="nav-link {{ Route::is('profile') ? 'text-secondary' : 'text-primary' }} me-2"
                    href="/profile">Sejarah Gereja</a>
            </li>

            {{-- Doa Paroki --}}
            <li class="nav-item">
                <a class="nav-link {{ Route::is('jadwal') ? 'text-secondary' : 'text-primary' }} me-2"
                    href="#">Doa Paroki</a>
            </li>

            {{-- Fasilitas --}}
            <li class="nav-item">
                <a class="nav-link {{ Route::is('layanan') ? 'text-secondary' : 'text-primary' }} me-2"
                    href="#">Fasilitas</a>
            </li>

            {{-- Pastor Paroki --}}
            <li class="nav-item">
                <a class="nav-link {{ Route::is('hubungi') ? 'text-secondary' : 'text-primary' }}" href="#">Pastor
                    Paroki</a>
            </li>

            {{-- Kegiatan --}}
            <li class="nav-item">
                <a class="nav-link {{ Route::is('hubungi') ? 'text-secondary' : 'text-primary' }}"
                    href="#">Kegiatan</a>
            </li>
    </div>
</div>
