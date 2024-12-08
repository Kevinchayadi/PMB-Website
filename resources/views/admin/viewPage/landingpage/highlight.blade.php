@extends('admin.layout.template')
@section('title', 'Admin - Article Page')

@section('content')
    <div class="container">
        <div class="section-1 mb-3">
            {{-- Carousel --}}
            <div class="title fs-4 fw-bolder">Carousel</div>
            <div class="row">
                <div class="col-4">
                    <img src="{{ asset('picture/Carousel-1.png') }}" class="img-fluid rounded-3 shadow-lg mb-2" alt="...">
                    <div class="btn btn-primary rounded-3 d-flex justify-content-center">Change Image</div>
                </div>
                <div class="col-4">
                    <img src="{{ asset('picture/Carousel-2.jpg') }}" class="img-fluid rounded-3 shadow-lg mb-2"
                        alt="...">
                    <div class="btn btn-primary rounded-3 d-flex justify-content-center">Change Image</div>
                </div>
                <div class="col-4">
                    <img src="{{ asset('picture/Carousel-3.png') }}" class="img-fluid rounded-3 shadow-lg mb-2"
                        alt="...">
                    <div class="btn btn-primary rounded-3 d-flex justify-content-center">Change Image</div>
                </div>
            </div>
        </div>

        <div class="section-2 mb-3">
            <div class="title fs-4 fw-bolder">Banner Atas</div>
            {{-- Banner atas --}}
            <div class="card mx-auto mb-3 col-9 mb-3 bg-dark rounded-3 shadow-lg d-lg-block d-none">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('picture/Misa.jpg') }}" class="img-fluid rounded-start mb-2" alt="...">
                        <div class="btn btn-primary rounded-3 d-flex justify-content-center">Change Image</div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="content align-content-center py-4 fs-1 d-lg-block d-none">
                                <input type="text" class="text-secondary form-control"
                                    placeholder="Ikuti misa pekan ini">
                                <div class="dropdown">
                                    <div class="btn btn-secondary text-dark dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        Navigate to
                                    </div>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </div>
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
                <a href= "https://youtube.com">
                    <img class="object-fit-contain w-100 rounded-3" src="{{ asset('picture/Subscribe.png') }}"
                        alt="">
                </a>
                <div class="mt-2 btn btn-primary rounded-3 d-flex justify-content-center">Change Image</div>
            </div>
        </div>

        <div class="save text-end mb-2 p-2">
            <div class="btn btn-primary fw-bolder">Save Changes</div>
        </div>

    </div>
@endsection
