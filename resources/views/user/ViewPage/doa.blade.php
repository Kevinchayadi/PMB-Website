<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@extends('user.Layout.profileTemplate')
@section('title', 'Doa')
@section('content')
    <div class="row mx-auto mb-2">
        @foreach ($doa as $doas)
            <div class="col-lg-6 col-12 p-2">
                <div class="bg-primary rounded p-2 hvr-shrink" data-bs-toggle="modal"
                    data-bs-target="#{{ trim($doas->nama_doa) }}">

                    {{-- Doa --}}
                    <div class="fs-6">
                        <div class="w-50 mx-auto fw-bolder text-center text-white">{{ $doas->nama_doa }}</div>
                    </div>
                </div>
                <div class="modal fade" id="{{ $doas->nama_doa }}" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="{{ $doas->nama_doa }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h1 class="modal-title fs-5" id="{{ $doas->nama_doa }}">Doa ABCEDF</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {{ $doas->deskripsi_doa }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
