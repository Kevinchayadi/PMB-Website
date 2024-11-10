<link rel="stylesheet" href="{{ asset('css/card.css') }}">

<div class="content">
    <div class="card">
        <img src="{{ asset('picture/Gereja.jpg') }}" class="card-img-top" alt="...">
    </div>
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
