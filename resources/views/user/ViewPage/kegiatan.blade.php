<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<link rel="stylesheet" href="{{ asset('css/image.css') }}">
@extends('user.Layout.profileTemplate')
@section('title', 'Kegiatan')
@section('content')
    <div class="row mx-auto mb-2">
        @forelse ($kegiatan as $kegiatans)
            <div class="col-lg-6 col-12 hvr-shrink">
                {{-- Gambar --}}
                <div class="content bg-primary rounded p-2 mb-2 w-100" data-bs-toggle="collapse"
                    data-bs-target="#{{ str_replace(' ', '-', $kegiatans->nama_acara) }}">
                    <img class="img-fluid custom-img rounded-3 mb-1 w-100" src="{{ asset('storage/' . $kegiatans->path) }}"
                        alt="">
                    <div class="fs-6 text-center text-white fw-bolder">{{ $kegiatans->title }}</div>
                    <div class="collapse text-white" id="{{ str_replace(' ', '-', $kegiatans->nama_acara) }}">
                        {{ $kegiatans->description }}
                    </div>
                </div>
            </div>
        @empty
            <div class="fs-5 text-center fw-bolder">Kegiatan tidak ada</div>
        @endforelse
    </div>
@endsection
