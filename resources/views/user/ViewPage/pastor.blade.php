<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@extends('user.Layout.profileTemplate')
@section('title', 'Pastor')
@section('content')
    <div class="row mx-auto mb-2">
        @foreach ($romo as $romos)
            <div class="col-lg-6 col-12 p-2">
                <div class="bg-primary rounded-3 shadow-lg p-2 hvr-shrink" data-bs-toggle="modal"
                    data-bs-target="#{{ str_replace([' ', '.', ','], '-', $romos->nama_romo) }}">
                    <img src="{{ $romos->path }}" alt="{{ str_replace([' ', '.', ','], '-', $romos->nama_romo) }}"
                        class="img-fluid rounded-3">
                    <div class="fs-6">
                        <div class="w-50 mx-auto fw-bolder text-center text-white">{{ $romos->nama_romo }}</div>
                    </div>
                </div>
                <div class="modal fade" id="{{ str_replace([' ', '.', ','], '-', $romos->nama_romo) }}"
                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="{{ str_replace([' ', '.', ','], '-', $romos->nama_romo) }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h1 class="modal-title fs-5 text-white"
                                    id="{{ str_replace([' ', '.', ','], '-', $romos->nama_romo) }}">
                                    {{ $romos->nama_romo }}
                                </h1>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="image mb-2">
                                    <img src="{{ asset('picture/Gereja.jpg') }}" alt=""
                                        class="img-fluid rounded-3 shadow-lg">
                                </div>
                                <div class="biodata mb-2">
                                    <div class="head fs-5 fw-bolder">Biodata</div>
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-lg-4 col-3">Nama</div>
                                            <div class="col-lg-8 col-9">: {{ $romos->nama_romo }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-3">Tempat Tanggal Lahir</div>
                                            <div class="col-lg-8 col-9">: {{ $romos->tempat_lahir }},
                                                {{ \Carbon\Carbon::parse($romos->DOB_romo)->translatedFormat('d F Y') }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-3">Nomor Telepon</div>
                                            <div class="col-lg-8 col-9">: {{ $romos->nomorhp_romo }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4 col-3">Jabatan</div>
                                            <div class="col-lg-8 col-9">: {{ $romos->jabatan }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pengalaman mb-2">
                                    <div class="head fs-5 fw-bolder">Pengalaman</div>
                                    <div class="content">
                                        {{ $romos->Pengalaman }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
