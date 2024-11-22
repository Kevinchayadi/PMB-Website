@extends('user.Layout.template')
@section('title', 'Layanan')

@section('content')
    <script src="{{ asset('js/layanan.js') }}"></script>
    <script>
        AOS.init()
    </script>
    <link rel="stylesheet" href="{{ asset('css/layanan.css') }}">
    <div class="container">

        <div class="content bg-primary rounded mb-2" d>
            <div class="show" id="show">
                <div class="image p-3 rounded">
                    <img class="img-fluid" src="{{ asset('picture/Gereja.jpg') }}" alt="">
                </div>
                <div class="bottom p-3 d-flex justify-content-between">
                    <div class="fs-5 fw-bolder text-white">Judul Layanan</div>
                    <div class="btn btn-outline-primary bg-white text-primary" onclick="showDetail()">
                        Info lebih lanjut
                    </div>
                </div>
            </div>

            <div class="hide p-3 d-none" id="hide">
                <div class="head fs-5 mb-2 fw-bolder text-white">Judul Layanan</div>
                <div class="description fs-6 text-white">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Porro provident labore cupiditate quasi eum
                    obcaecati non,
                    odit delectus! Minima iure ratione culpa corrupti tempora maiores non quae laudantium in optio.
                </div>
                <div class="bottom d-flex justify-content-between">
                    <div class="btn btn-outline-primary bg-white text-primary" onclick="hideDetail()">
                        Tutup
                    </div>
                    <div class="btn btn-outline-primary bg-white text-primary">
                        <a href="" class="nav-link">Daftar Sekarang</a>
                    </div>
                </div>
            </div>

        </div>

        <div class="content bg-primary rounded mb-2">
            <div class="show" id="show">
                <div class="image p-3 rounded">
                    <img class="img-fluid" src="{{ asset('picture/Gereja.jpg') }}" alt="">
                </div>
                <div class="bottom p-3 d-flex justify-content-between">
                    <div class="fs-5 fw-bolder text-white">Judul Layanan</div>
                    <div class="btn btn-outline-primary bg-white text-primary" onclick="show()">
                        Info lebih lanjut
                    </div>
                </div>
            </div>
            <div class="hide p-3" id="hide">
                <div class="head fs-5 mb-2 fw-bolder text-white">Judul Layanan</div>
                <div class="description fs-6 text-white">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Porro
                    provident
                    labore cupiditate quasi eum obcaecati non, odit delectus! Minima iure ratione culpa corrupti tempora
                    maiores non quae laudantium in optio.
                </div>
                <div class="bottom d-flex justify-content-between">
                    <div class="btn btn-outline-primary bg-white text-primary" onclick="hide()">
                        Tutup
                    </div>
                    <div class="btn btn-outline-primary bg-white text-primary">
                        <a href="" class="nav-link">Daftar Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
@endsection
