<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@extends('user.Layout.profileTemplate')
@section('title', 'Kegiatan')
@section('content')
    <div class="row mx-auto mb-2">
        {{-- {{ dd($kegiatan) }} --}}
        @if ($kegiatan->count() > 0)
            @foreach ($kegiatan as $kegiatans)
                <div class="col-lg-6 col-12 hvr-shrink">
                    {{-- Gambar --}}
                    <div class="content bg-primary rounded p-2 mb-2" data-bs-toggle="collapse"
                        data-bs-target="#{{ str_replace(' ', '-', $kegiatans->nama_acara) }}">
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
            @endforeach
        @else
            <div class="fs-5 text-center fw-bolder">Tidak ada kegiatan</div>
        @endif
    </div>
@endsection
