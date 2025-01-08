<link rel="stylesheet" href="{{ asset('css/image.css') }}">
@extends('user.Layout.template')
@section('title', 'Layanan')
@section('content')
    <div class="container-fluid row mx-auto justify-content-center">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @forelse ($layanan as $layanans)
            <div class="col-lg-4 col-12 p-2">
                <div class="bg-primary rounded p-2 hvr-shrink" data-bs-toggle="modal" data-bs-target="#{{ $layanans->slug }}">
                    {{-- Gambar --}}
                    <img class="img-fluid custom-img rounded-3 mb-2" src="{{ asset('storage/' . $layanans->path) }}"
                        alt="{{ $layanans->slug }}">
                    {{-- Description --}}
                    <div class="fs-5">
                        <div class="w-50 mx-auto fw-bolder text-center text-white">{{ $layanans->nama_acara }}</div>
                    </div>
                </div>
                <div class="modal fade" id="{{ $layanans->slug }}" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="{{ $layanans->slug }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <div class="modal-title fs-4 text-white" id="{{ $layanans->slug }}">
                                    {{ $layanans->nama_acara }}</div>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body fs-5">
                                {{ $layanans->deskripsi_acara }}
                            </div>

                            @if (Auth::check())
                                <div class="modal-btn text-center mb-2">
                                    <a class="btn text-primary bg-white hvr-border-fade" data-bs-toggle="modal"
                                        data-bs-target="#daftar-{{ $layanans->slug }}">Daftar Sekarang</a>
                                </div>
                            @else
                                <div class="modal-btn text-center mb-2">
                                    <a class="btn text-primary bg-white hvr-border-fade disabled" data-bs-toggle="modal"
                                        data-bs-target="#daftar-{{ $layanans->slug }}" aria-disabled="true">Daftar
                                        Sekarang</a>
                                </div>
                                <div class="fs-5 text-center text-danger">Anda harus login untuk melakukan pendaftaran
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="daftar-{{ $layanans->slug }}" data-bs-backdrop="static"
                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="daftar-{{ $layanans->slug }}"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h1 class="modal-title fs-5 text-white" id="form-a">Daftar
                                    {{ $layanans->nama_acara }}</h1>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/request" method="POST">
                                    @csrf
                                    <input type="text" class="form-control" id="nama_acara" name="nama_acara"
                                        placeholder="Contoh: John Smith" value="{{ $layanans->nama_acara }}" hidden>
                                    <input type="text" class="form-control" id="id_umat"name="id_umat" value="1"
                                        hidden>
                                    <div class="mb-3">
                                        <label for="nama_terlibat_satu" class="form-label">Nama Terlibat 1</label>
                                        <input type="text" class="form-control" id="nama_terlibat_satu"
                                            name="nama_terlibat_satu" placeholder="Contoh: John Smith" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nama_terlibat_dua" class="form-label">Nama Terlibat 2</label>
                                        <input type="text" class="form-control" id="nama_terlibat_dua"
                                            name="nama_terlibat_dua" placeholder="Contoh: John Smith">
                                    </div>

                                    <div class="mb-3">
                                        <label for="nama_romo" class="form-label">Nama Romo</label>
                                        <input type="text" class="form-control" id="nama_romo" name="nama_romo"
                                            placeholder="Contoh: John Smith">
                                    </div>

                                    <div class="mb-3">
                                        <label for="jadwal_acara" class="form-label">Jadwal Acara</label>
                                        <input type="date" class="form-control" id="jadwal_acara" name="jadwal_acara">
                                    </div>

                                    <div class="mb-3">
                                        <label for="deskripsi_pengajuan" class="form-label">Catatan</label>
                                        <textarea class="form-control" id="deskripsi_pengajuan" name="deskripsi_pengajuan" rows="3"
                                            placeholder="Contoh: Tolong segera diproses nya"></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary hvr-shrink">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="fs-5 fw-bolder text-center">Layanan tidak ada</div>
        @endforelse
    </div>
@endsection
