@extends('Layout.template')
@section('title', 'Layanan')

@section('content')
    <div class="container-fluid row pe-0">
        <div class="left col-md-6 col-12 pe-0">
            <div class="content bg-primary rounded mb-2">
                <div class="image p-2 rounded">
                    <img class="img-fluid" src="{{ asset('picture/Gereja.jpg') }}" alt="">
                </div>

                <div class="bottom p-2 d-flex justify-content-between">
                    <div class="fs-5 fw-bolder text-white">Judul Layanan</div>
                    <div class="btn btn-outline-primary bg-white text-primary">
                        <a href="" class="nav-link">Info lebih lanjut</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="right col-md-6 col-12 pe-0">
            <div class="content bg-primary rounded mb-2">
                <div class="image p-2 rounded">
                    <img class="img-fluid" src="{{ asset('picture/Gereja.jpg') }}" alt="">
                </div>

                <div class="bottom p-2 d-flex justify-content-between">
                    <div class="fs-5 fw-bolder text-white">Judul Layanan</div>
                    <div class="btn btn-outline-primary bg-white text-primary">
                        <a href="" class="nav-link">Info lebih lanjut</a>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
