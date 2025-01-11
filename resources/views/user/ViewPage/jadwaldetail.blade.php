@extends('user.Layout.template')
@section('title', $transaction->judul)

@section('content')
    <div class="container-fluid row">
        <div class="mid col-lg-10 col-12 ps-4">
            {{-- Judul --}}
            <div class="head fs-4 fw-bolder mb-2">{{ $transaction->judul }}</div>

            {{-- Carousel --}}
            <div id="carouselforhighlight" class="carousel slide w-100 mx-auto mb-3" data-bs-ride="carousel">
                <div class="carousel-inner rounded-3 shadow-lg">
                    <div class="carousel-item active">
                        <img src="{{ $highlight[0]->path }}" class="d-block w-100" alt="Highlight-Image-1">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ $highlight[1]->path }}" class="d-block w-100" alt="Highlight-Image-2">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ $highlight[2]->path }}" class="d-block w-100" alt="Highlight-Image-3">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselforhighlight"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselforhighlight"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            {{-- Deskripsi --}}
            <div class="description fs-5 fw-bolder mb-2">Deskripsi</div>
            <div class="content fs-6">{{ $transaction->transactionDetails->deskripsi_transaksi }}
            </div>

            {{-- Waktu dan tempat --}}
            <div class="description fs-5 fw-bolder mb-2">Waktu dan Tempat</div>
            <div class="waktu fs-6">{{ $transaction->jadwal_transaction }}</div>
            <div class="tempat fs-6">Di Gereja Santo Petrus dan Paulus</div>

            {{-- Tombol daftar --}}
            <form action="/registerJadwal/{{ $transaction->id_transaction }}" method="POST">
                @csrf
                @method('PUT')
                <button class="mt-3 btn btn-primary hvr-shrink {{ $isRegister ? 'disabled' : '' }}" type="submit">Ikut
                    Kegiatan
                    Ini</button>
            </form>
        </div>

        <div class="other mb-2 mx-2">
            <div class="title fs-5 fw-bolder">Lihat Jadwal Lainnya...</div>
            <div class="row">
                @forelse($moreTransaction as $jadwal)
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $jadwal->judul }}</h5>
                                <p class="card-text">{{ $jadwal->transactionDetails->deskripsi_transaksi }}
                                </p>
                                <a href="/jadwal/{{ $jadwal->id_transaction }}"
                                    class="btn btn-primary hvr-shrink">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="fs-5 text-center fw-bolder">Tidak ada jadwal</div>
                @endforelse
            </div>
        </div>
    </div>
@endsection()
