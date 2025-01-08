@extends('user.Layout.template')
@section('title', 'Artikel')

@section('content')
    <div class="container-fluid row mb-lg-0 mb-4 px-0 justify-content-center">
        <div class="col-lg-10 col-12">
            <div class="artikel mb-lg-0 mb-4 pe-0">

                {{-- Artikel head --}}
                <div class="px-4">
                    <div class="head-section d-flex justify-content-between">
                        <div class="align-self-center fs-5 fw-bolder">Artikel</div>
                    </div>
                    <hr>
                </div>

                {{-- Content --}}
                @forelse($artikel as $artikels)
                    <div class="right-content mx-4 border-bottom mb-2">
                        <div class="head fs-5 text-gray">{{ $artikels->title }}</div>
                        <div class="desc fs-6">{{ $artikels->body }}</div>
                        <a class="nav-link text-primary hvr-shrink" href="/artikel/{{ $artikels->id }}">Selengkapnya</a>
                    </div>
                @empty
                    <div class="fs-5 fw-bolder text-center">Artikel tidak ada</div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
