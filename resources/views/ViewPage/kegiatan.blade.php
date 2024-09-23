<link rel="stylesheet" href="{{ asset('csss/profile.css') }}">
@extends('Layout.template')
@section('title', 'Profile')
@section('content')
    @include('Layout.card')

    <div class="container-fluid row">
        <div class="left col-lg-6 col-12">
            <div class="content bg-primary rounded p-2 mb-2">
                <img class="img-fluid rounded mb-1" src="{{ asset('picture/Gereja.jpg') }}" alt="">
                <div class="fs-6">Kegiatan</div>
            </div>
        </div>
        <div class="right col-lg-6 col-12">
            <div class="content bg-primary rounded p-2 mb-2">
                <img class="img-fluid rounded mb-1" src="{{ asset('picture/Gereja.jpg') }}" alt="">
                <div class="fs-6">Kegiatan</div>
            </div>
        </div>

    </div>
@endsection
