<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@extends('Layout.profileTemplate')
@section('title', 'Pastor')
@section('content')
    <div class="row mb-2">
        {{-- Gambar --}}
        <div class="left col-lg-5 col-12 px-lg-2 px-auto">
            <div class="bg-primary rounded p-2">
                <img src="{{ asset('picture/Gereja.jpg') }}" alt="" class="img-fluid rounded">
            </div>
        </div>

        {{-- Content --}}
        <div class="right col-lg-7 col-12">
            <div class="head fs-4 fw-bolder mb-2">Pastor A</div>
            <div class="desc fs-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum assumenda praesentium,
                ipsum similique sunt animi perspiciatis tenetur veniam, reiciendis cupiditate, dolores distinctio ipsa
                sapiente nam qui molestias vel. Provident, velit.</div>
        </div>
    </div>

    {{-- Biodata --}}
    <div class="biodata mb-2">
        <div class="head fs-4 fw-bolder mb-2">Biodata</div>
        <div class="content fs-5">
            <div class="row">
                <div class="col-lg-2 col-3">Nama</div>
                <div class="col-lg-10 col-9">: Loremmmmm</div>
            </div>
            <div class="row">
                <div class="col-lg-2 col-3">Tempat Tanggal Lahir</div>
                <div class="col-lg-10 col-9">: Loremmmmm</div>
            </div>
        </div>
    </div>

    {{-- Pengalaman --}}
    <div class="pengalaman mb-2">
        <div class="head fs-4 fw-bolder mb-2">Pengalaman</div>
        <div class="pengalaman fs-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum nemo delectus
            assumenda labore sequi mollitia, praesentium aliquam autem voluptates doloremque dolore saepe cupiditate,
            libero sint quaerat cumque ut eligendi voluptate.</div>
    </div>
@endsection
