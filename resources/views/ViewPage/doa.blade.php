<link rel="stylesheet" href="{{ asset('csss/profile.css') }}">
@extends('Layout.template')
@section('title', 'Profile')
@section('content')
    @include('Layout.card')

    <div class="container-fluid row mx-auto mb-2">
        <div class="left col-lg-6 col-12 p-2">
            <div class="bg-primary rounded p-2">
                {{-- Gambar --}}
                <img class="img-fluid rounded mb-2" src="{{ asset('picture/Gereja.jpg') }}" alt="">

                {{-- Doa --}}
                <div class="rounded fs-6">
                    <div class="bg-secondary rounded w-50 mx-auto fw-bolder text-center text-white">Doa ABCEDF</div>
                    <div class="description bg-soft-blue rounded p-2">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Et architecto accusantium officiis tempore
                        consequatur porro qui magnam reiciendis alias, quibusdam ullam cumque enim earum! Deleniti
                        cupiditate quaerat totam repellendus officiis.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab commodi et est saepe optio quaerat
                        quisquam eaque tenetur hic placeat eius ut beatae, at sunt quidem? Quisquam expedita necessitatibus
                        quidem.
                    </div>
                </div>
            </div>
        </div>

        <div class="right col-lg-6 col-12 p-2">
            <div class="bg-secondary rounded p-2">
                {{-- Gambar --}}
                <img class="img-fluid rounded mb-2" src="{{ asset('picture/Gereja.jpg') }}" alt="">

                {{-- Doa --}}
                <div class="rounded fs-6">
                    <div class="bg-primary rounded w-50 mx-auto fw-bolder text-center text-white">Doa ABCEDF</div>
                    <div class="description bg-soft-orange rounded p-2">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Et architecto accusantium officiis tempore
                        consequatur porro qui magnam reiciendis alias, quibusdam ullam cumque enim earum! Deleniti
                        cupiditate quaerat totam repellendus officiis.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab commodi et est saepe optio quaerat
                        quisquam eaque tenetur hic placeat eius ut beatae, at sunt quidem? Quisquam expedita necessitatibus
                        quidem.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
