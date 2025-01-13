@extends('user.Layout.template')
@section('title', 'Jadwal')

@section('content')
    <div class="container-fluid row mb-lg-0 px-0 justify-content-center">
        <div class="mid col-lg-9 col-12">
            {{-- Jadwal misa head --}}
            <div class="px-4">
                <div class="head-section d-flex justify-content-between">
                    <div class="align-self-center fs-4 fw-bolder text-primary">Jadwal Misa</div>
                </div>
                <hr>
            </div>

            @forelse ($transactions as $transaction)
                {{-- Content --}}
                <div class="ms-3 row me-0">
                    <div class="right-content pe-2 col-12 row">
                        <div class="text align-self-center col-lg-9 col-12">
                            <div class="head fs-4 fw-bolder">{{ $transaction->judul }}</div>
                            <div class="desc fs-6">{{ $transaction->doa->ayat_renungan }}</div>
                            <div class="h6 text-gray">{{ $transaction->jadwal_transaction }}</div>
                        </div>
                        <div class="button align-self-center text-end col-lg-3 col-12">
                            <div class="btn text-primary bg-white w-100 hvr-border-fade">
                                <a href="/jadwal/{{ $transaction->id_transaction }}" class="nav-link">Lihat Info</a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            @empty
                <div class="fs-5 fw-bolder text-center">Jadwal tidak ada</div>
            @endforelse
        </div>
    </div>
@endsection
