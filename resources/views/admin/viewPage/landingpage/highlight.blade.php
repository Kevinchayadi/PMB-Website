@extends('admin.layout.template')
@section('title', 'Admin - Article Page')

@section('content')
    <div class="container">
        <div class="form" action="/highlight" method="POST">
            @csrf
            <div class="section-1 mb-3">
                {{-- Carousel --}}
                <div class="title fs-4 fw-bolder">Carousel</div>
                <div class="row">
                    <div class="col-4">
                        <img src="{{ $highlight[0]->path }}" class="img-fluid rounded-3 shadow-lg mb-2" alt="...">
                        <input type="file" id="{{ $highlight[0]->nama }}" name="{{ $highlight[0]->nama }}"
                            class="btn btn-primary rounded-3 d-flex justify-content-center w-100">
                        </input>
                    </div>
                    <div class="col-4">
                        <img src="{{ $highlight[1]->path }}" class="img-fluid rounded-3 shadow-lg mb-2" alt="...">
                        <input type="file" id="{{ $highlight[1]->nama }}" name="{{ $highlight[1]->nama }}"
                            class="btn btn-primary rounded-3 d-flex justify-content-center w-100">
                        </input>
                    </div>
                    <div class="col-4">
                        <img src="{{ $highlight[2]->path }}" class="img-fluid rounded-3 shadow-lg mb-2" alt="...">
                        <input type="file" id="{{ $highlight[2]->nama }}" name="{{ $highlight[2]->nama }}"
                            class="btn btn-primary rounded-3 d-flex justify-content-center w-100"></input>
                    </div>
                </div>
            </div>

            <div class="section-2 mb-3">
                <div class="title fs-4 fw-bolder">Banner Atas</div>
                {{-- Banner atas --}}
                <div class="card mx-auto mb-3 col-9 mb-3 bg-dark rounded-3 shadow-lg d-lg-block d-none">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ $highlight[3]->path }}" class="img-fluid rounded-start mb-2" alt="...">
                            <input type="file" id="{{ $highlight[3]->nama }}" name="{{ $highlight[3]->nama }}"
                                class="btn btn-primary rounded-3 d-flex justify-content-center w-100"></input>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="content align-content-center py-4 fs-1 d-lg-block d-none">
                                    <input type="text" class="text-secondary form-control"
                                        placeholder="{{ $highlight[3]->nama }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-3 mb-3">
                <div class="title fs-4 fw-bolder">Banner Bawah</div>
                {{-- Banner bawah --}}
                <div class="banner-bottom my-4 rounded-3 shadow-lg w-75 mx-auto">
                    <img class="object-fit-contain w-100 rounded-3" src="{{ $highlight[4]->path }}" alt="">
                    <input type="file" id="{{ $highlight[4]->nama }}" name="{{ $highlight[4]->nama }}"
                        class="btn btn-primary rounded-3 d-flex justify-content-center w-100">
                    </input>
                </div>
            </div>

            <div class="save text-end mb-2 p-2">
                <div class="btn btn-primary fw-bolder">Save Changes</div>
            </div>
        </div>
    </div>
@endsection
