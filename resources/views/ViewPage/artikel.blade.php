@extends('Layout.template')
@section('title', 'Artikel')

@section('content')
    <div class="container-fluid">
        <div class="artikel mb-lg-0 mb-4 pe-0">

            {{-- Artikel head --}}
            <div class="px-4">
                <div class="head-section d-flex justify-content-between">
                    <div class="align-self-center fs-5 fw-bolder">Artikel</div>
                </div>
                <hr>
            </div>

            {{-- Content --}}
            <div class="right-content mx-4">
                <div class="head fs-5 text-gray">Apa Makna Natal Bagi Saya di saat seperti ini?</div>
                <div class="desc fs-6">Bulan Desember merupakan bulan yang paling ditunggu oleh banyak orang</div>
                <a class="nav-link text-primary" href="/artikel/1">Selengkapnya</a>
            </div>
        </div>
    </div>
@endsection
