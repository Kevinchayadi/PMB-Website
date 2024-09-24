<link rel="stylesheet" href="{{ asset('csss/profile.css') }}">
@extends('Layout.template')
@section('title', 'Kegiatan')
@section('content')
    @include('Layout.card')

    <div class="container-fluid row pe-0">
        {{-- Kiri --}}
        <div class="left col-lg-6 col-12 pe-0">
            {{-- Gambar --}}
            <div class="content bg-primary rounded p-2 mb-2">
                <img class="img-fluid rounded mb-1" src="{{ asset('picture/Gereja.jpg') }}" alt="">
                <div class="fs-6 text-center text-white">Kegiatan</div>
            </div>
        </div>

        {{-- Kanan --}}
        <div class="right col-lg-6 col-12 pe-0">
            {{-- Gambar --}}
            <div class="content bg-primary rounded p-2 mb-2">
                <img class="img-fluid rounded mb-1" src="{{ asset('picture/Gereja.jpg') }}" alt="">
                <div class="fs-6 text-center text-white">Kegiatan</div>
            </div>
        </div>

    </div>
@endsection
