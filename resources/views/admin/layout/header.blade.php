<link rel="stylesheet" href="{{ asset('css/header.css') }}">
<div class="header navbar px-3 border-bottom">
    {{-- Logo --}}
    <div class="logo row">
        <img class="img-fluid px-1" src="{{ asset('picture/Logo Paroki baru 2.png') }}" alt="">
        <div class="title align-self-center col-4 row">

            {{-- Nama gereja --}}
            <div class="col-lg-12 col-10">
                <div class="name">
                    <div class="fs-5 fw-bold">Gereja St. Petrus & Paulus</div>
                </div>
                <div class="address">
                    <div class="fs-6">Paroki Mangga Besar</div>
                </div>
            </div>
        </div>
        <div class="col-8 align-end d-flex">
            <div class="username fs-6">Username</div>
            <div class="icon">
                <a href="/admin/login">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                        <path fill-rule="evenodd"
                            d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

</div>
