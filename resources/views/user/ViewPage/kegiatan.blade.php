@extends('user.Layout.profileTemplate')
@section('title', 'Kegiatan')
@section('content')
    <div class="row mx-auto mb-2">
        {{-- Kiri --}}
        <div class="left col-lg-6 col-12">
            {{-- Gambar --}}
            <div class="content bg-primary rounded p-2 mb-2" data-bs-toggle="collapse" data-bs-target="#kegiatan-a">
                <img class="img-fluid rounded-3 mb-1" src="{{ asset('picture/Gereja.jpg') }}" alt="">
                <div class="fs-6 text-center text-white fw-bolder">Kegiatan A</div>
                <div class="collapse text-white" id="kegiatan-a">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, dignissimos sunt inventore
                    totam praesentium porro rerum. Ipsa error quos vero mollitia laborum? Quaerat veniam error
                    porro
                    ea, eligendi quia et!
                </div>
            </div>
        </div>

        {{-- Kanan --}}
        <div class="right col-lg-6 col-12">
            {{-- Gambar --}}
            <div class="content bg-primary rounded p-2 mb-2" data-bs-toggle="collapse" data-bs-target="#kegiatan-b">
                <img class="img-fluid rounded mb-1" src="{{ asset('picture/Gereja.jpg') }}" alt="">
                <div class="fs-6 text-center text-white fw-bolder">Kegiatan B</div>
                <div class="collapse text-white" id="kegiatan-b">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, dignissimos sunt inventore
                    totam praesentium porro rerum. Ipsa error quos vero mollitia laborum? Quaerat veniam error
                    porro
                    ea, eligendi quia et!
                </div>
            </div>
        </div>
    </div>
@endsection
