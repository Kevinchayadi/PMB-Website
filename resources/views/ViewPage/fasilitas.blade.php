<link rel="stylesheet" href="{{ asset('csss/profile.css') }}">
@extends('Layout.template')
@section('title', 'Profile')
@section('content')
    @include('Layout.card')
    <div class="container-fluid">
        <div class="content row mb-2">

            {{-- Gambar --}}
            <div class="col-lg-4 col-6">
                <div class="bg-primary p-2 rounded">
                    <img class="img-fluid rounded" src="{{ asset('picture/Gereja.png') }}" alt="">
                </div>
            </div>

            {{-- Tulisan --}}
            <div class="col-lg-8 col-6">
                {{-- Judul --}}
                <div class="head fs-4 mb-2">Gedung Karya Pastoral</div>

                {{-- Deskripsi --}}
                <div class="description fs-5">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae nostrum blanditiis sequi unde quidem
                    quam provident. Recusandae sequi, quas possimus quibusdam inventore saepe, repellendus, iure minima sed
                    sit ipsa ratione.
                </div>
            </div>

        </div>
    </div>
@endsection
