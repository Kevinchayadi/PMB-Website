@extends('admin.layout.template')
@section('title', 'Acara Yang Akan Datang')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">

    <div class="event mx-3 my-2">
        <div class= "px-5 d-flex justify-content-between align-items-center">
            <h1 class="fw-bold fs-4">Acara Yang Akan Datang</h1>
        </div>
        <div class="px-4 py-2 my-3 mx-1 card-3d">
            <h2>Nama Acara</h2>
            <div class="d-flex justify-content-between">
                <p>Deskripsi Acara</p>
                <div>
                    <a href="">Detail</a>
                    <a href="">Batal</a>
                </div>
            </div>
        </div>
        <div class="px-4 py-2 my-3 mx-1 card-3d">
            <h2>Nama Acara</h2>
            <div class="d-flex justify-content-between">
                <p>Deksripsi Acara</p>
                <div>
                    <a href="">Perbarui</a>
                    <a href="">Batal</a>
                </div>
            </div>
        </div>
    </div>


@endsection
