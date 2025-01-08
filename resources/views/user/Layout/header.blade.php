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

                {{-- Home --}}
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('home') ? 'text-secondary' : 'text-primary hvr-float' }} me-2"
                        href="/home">Beranda</a>
                </li>

                {{-- Profile --}}
                <li class="nav-item">
                    <a class="nav-link {{ (Route::is('visiMisi') or Route::is('doa') or Route::is('fasilitas') or Route::is('pastor') or Route::is('kegiatan')) ? 'text-secondary' : 'text-primary hvr-float' }} me-2"
                        href="/profil/sejarahVisiMisi">Profil</a>
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
                    {{-- User --}}
                    <li class="nav-item py-2 fw-bolder d-lg-none d-block">
                        Halo, <span class="text-primary">{{ Auth::guard('web')->user()->nama_umat }}</span>
                    </li>

                    {{-- Dashboard --}}
                    <li class="nav-item hvr-float">
                        <a class="nav-link {{ Route::is('histori') ? 'text-secondary' : 'text-primary' }} me-2"
                            href="/histori">Histori</a>
                    </li>
                @endif

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
                <div class="row col-8" data-bs-toggle="modal" data-bs-target="#Modal">
                    @if (empty(Auth::user()->nama_baptis) or
                            empty(Auth::user()->ttl_umat) or
                            empty(Auth::user()->wilayah) or
                            empty(Auth::user()->lingkungan) or
                            empty(Auth::user()->nomorhp_umat) or
                            empty(Auth::user()->alamat) or
                            empty(Auth::user()->status) or
                            empty(Auth::user()->pekerjaan))
                        <div class="col-3 ps-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-exclamation-circle-fill text-secondary" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4m.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2" />
                            </svg>
                        </div>
                    @else
                    @endif
                    <div class="username col-9 px-0 fw-bolder">
                        Halo,<span class="ms-1 text-primary">{{ Auth::guard('web')->user()->nama_umat }} </span>
                    </div>
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
                <!-- Modal -->
                <div class="modal fade" id="Modal" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="ModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h1 class="modal-title fs-5 text-white" id="ModalLabel">Update Data</h1>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="Terlibat-1" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="Terlibat-1"
                                            placeholder="Contoh: John Smith" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="Terlibat-2" class="form-label">Nomor Telepon</label>
                                        <input type="number" class="form-control" id="Terlibat-2"
                                            placeholder="081237171">
                                    </div>

                                    <div class="mb-3">
                                        <label for="Romo" class="form-label">Email</label>
                                        <input type="text" class="form-control" disabled id="Romo"
                                            placeholder="email@lorem.co.id">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
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
