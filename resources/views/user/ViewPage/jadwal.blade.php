@extends('user.Layout.template')
@section('title', 'Jadwal')

@section('content')
    <div class="container-fluid row mb-lg-0 px-0 justify-content-center">
        <div class="mid col-lg-9 col-12">
            {{-- Jadwal misa head --}}
            <div class="px-4">
                <div class="head-section d-flex justify-content-between">
                    <div class="align-self-center fs-5 fw-bolder">Jadwal Misa</div>
                </div>
                <hr>
            </div>

            @if ($transactions->count() > 0)
                @foreach ($transactions as $transaction)
                    {{-- Content --}}
                    <div class="ms-3 row me-0">

                        {{-- Looping --}}
                        {{-- <div class="left-content text-gray px-2 align-self-center col-lg-2 col-4 flex-start">
                        <div class="d-flex justify-content-center">
                            <div class="align-self-center d-lg-block d-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#7A7A7A"
                                    class="bi bi-calendar align-self-center fs-xl-3" viewBox="0 0 16 16">
                                    <path
                                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                                </svg>
                            </div>
                            <div class="h4 mt-lg-2 ms-lg-2 align-self-center">$transaction->jadwal-transaction</div>
                        </div>
                        <div class="h5 text-center">Januari</div>
                    </div> --}}
                        <div class="right-content pe-2 col-lg-10 col-8 row">
                            <div class="text align-self-center col-lg-9 col-12">
                                <div class="head fs-5">Hari Raya Penampakan Tuhan</div>
                                <div class="desc fs-6">Bacaan: Yes. 60:1-6; Mzm. 72:1-2,7-8,10-11,12-13; Ef. 3:2-3a,5-6;
                                    Mat.
                                    2:1-12</div>
                                <div class="h6 text-gray">Minggu, 2 Januari 2022 pkl 07.30 WIB</div>
                            </div>
                            <div class="button align-self-center text-end col-lg-3 col-12">
                                <div class="btn text-primary bg-white w-100 hvr-border-fade">
                                    <a href="/jadwal/1" class="nav-link">Lihat Info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="fs-5 fw-bolder text-center">Jadwal tidak ada</div>
            @endif
        </div>
    </div>
@endsection
