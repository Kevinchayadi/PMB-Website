<link rel="stylesheet" href="{{ asset('csss/profile.css') }}">
@extends('Layout.template')
@section('title', 'Profile')
@section('content')
    @include('Layout.card')
    <div class="container-fluid">
        <div class="section-1 row mb-2">
            {{-- Gambar --}}
            <div class="col-lg-6 col-12">
                <div class="bg-primary p-2">
                    <img class="img-fluid" src="{{ asset('picture/Gereja.jpg') }}" alt="gambar-1">
                </div>
            </div>
            {{-- Description --}}
            <div class="col-lg-6 col-12 desc-1 fs.6">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Provident nulla quas quos doloribus necessitatibus
                alias magni fugit qui saepe maiores exercitationem dolorem, inventore tempore aliquid illo, quae porro
                nostrum sunt!
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsam excepturi omnis illo pariatur ut nam
                exercitationem sint cumque eveniet rem itaque, corporis velit. Ipsum, vel ab ipsam corrupti odit quisquam.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nulla saepe deserunt vitae atque fugiat, ipsa
                corporis explicabo alias aspernatur, iste dolore mollitia aut doloremque suscipit quia nostrum repellat
                modi.
            </div>
        </div>

        <div class="section-2 row mb-2">
            {{-- Gambar (untuk display lg ke bawah) --}}
            <div class="col-12 d-lg-none">
                <div class="bg-secondary p-2">
                    <img class="img-fluid" src="{{ asset('picture/Gereja.jpg') }}" alt="gambar-1">
                </div>
            </div>

            {{-- Description --}}
            <div class="col-lg-6 col-12 desc-1 fs.6">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Provident nulla quas quos doloribus necessitatibus
                alias magni fugit qui saepe maiores exercitationem dolorem, inventore tempore aliquid illo, quae porro
                nostrum sunt!
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsam excepturi omnis illo pariatur ut nam
                exercitationem sint cumque eveniet rem itaque, corporis velit. Ipsum, vel ab ipsam corrupti odit quisquam.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad nulla saepe deserunt vitae atque fugiat, ipsa
                corporis explicabo alias aspernatur, iste dolore mollitia aut doloremque suscipit quia nostrum repellat
                modi.
            </div>
            {{-- Gambar untuk display lg --}}
            <div class="col-lg-6 col-12 d-lg-block d-none">
                <div class="bg-primary p-2">
                    <img class="img-fluid" src="{{ asset('picture/Gereja.jpg') }}" alt="gambar-1">
                </div>
            </div>
        </div>


    </div>
@endsection
