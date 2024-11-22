@extends('user.Layout.template')
@section('title', 'Artikel')

@section('content')
    <div class="container-fluid row mb-lg-0 mb-4 px-0 justify-content-center">
        <div class="left col-3 d-lg-block d-none border-end px-4">
            <div class="title fs-5 fw-bolder border-bottom">Ayat Suci</div>
            <div class="content fs-6">
                <div class="content-title fw-bolder">Lorem 12:3</div>
                <div class="content-description">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione reiciendis aliquid, quis magni odio
                    debitis accusantium odit reprehenderit veniam voluptates vero enim harum sit voluptate tenetur
                    molestias, rem et est.
                </div>
            </div>
        </div>
        <div class="mid col-lg-9 col-12">
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
    </div>
@endsection
