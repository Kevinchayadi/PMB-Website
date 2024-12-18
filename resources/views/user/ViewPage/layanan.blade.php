@extends('user.Layout.template')
@section('title', 'Layanan')
@section('content')
    <div class="container-fluid row mx-auto">
        @if ($layanan->count() > 0)
            @foreach ($layanan as $layanans)
                <div class="col-lg-4 col-12 p-2">
                    <div class="bg-primary rounded p-2 hvr-shrink" data-bs-toggle="modal"
                        data-bs-target="#{{ $layanans->slug }}">
                        {{-- Gambar --}}
                        <img class="img-fluid rounded-3 mb-2" src="{{ $layanans->path }}" alt="{{ $layanans->slug }}">
                        {{-- Description --}}
                        <div class="fs-6">
                            <div class="w-50 mx-auto fw-bolder text-center text-white">{{ $layanans->nama_acara }}</div>
                        </div>
                    </div>
                    <div class="modal fade" id="{{ $layanans->slug }}" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="{{ $layanans->slug }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                    <h1 class="modal-title fs-5 text-white" id="{{ $layanans->slug }}">
                                        {{ $layanans->nama_acara }}</h1>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {{ $layanans->deskripsi_acara }}
                                </div>

                                <div class="modal-btn text-center mb-2">
                                    <a class="btn text-primary bg-white hvr-border-fade" data-bs-toggle="modal"
                                        data-bs-target="#daftar-{{ $layanans->slug }}">Daftar Sekarang</a>
                                </div>
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
                                    <form>
                                        <div class="mb-3">
                                            <label for="Terlibat-1" class="form-label">Nama Terlibat 1</label>
                                            <input type="text" class="form-control" id="Terlibat-1"
                                                placeholder="Contoh: John Smith" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="Terlibat-2" class="form-label">Nama Terlibat 2</label>
                                            <input type="text" class="form-control" id="Terlibat-2"
                                                placeholder="Contoh: John Smith">
                                        </div>

                                        <div class="mb-3">
                                            <label for="Romo" class="form-label">Nama Romo</label>
                                            <input type="text" class="form-control" id="Romo"
                                                placeholder="Contoh: John Smith">
                                        </div>

                                        <div class="mb-3">
                                            <label for="Jadwal" class="form-label">Jadwal Acara</label>
                                            <input type="date" class="form-control" id="Jadwal">
                                        </div>

                                        <div class="mb-3">
                                            <label for="Description" class="form-label">Catatan</label>
                                            <textarea class="form-control" id="Description" rows="3" placeholder="Contoh: Tolong segera diproses nya"></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-primary hvr-shrink">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="fs-5 fw-bolder text-center">Layanan tidak ada</div>
        @endif
    </div>
@endsection
