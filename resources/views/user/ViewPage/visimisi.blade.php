<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@extends('user.Layout.profileTemplate')
@section('title', 'Profile')
@section('content')
    {{-- Visi dan Misi --}}
    <div class="fs-5 fw-bolder ps-2">Visi & Misi Gereja</div>
    <div class="row mb-3 mx-auto">
        <div class="left col-lg-6 col-12 p-2 hvr-shrink">
            <div class="bg-primary rounded-3 shadow-lg p-2" data-bs-toggle="collapse" data-bs-target="#collapse-visi"
                aria-expanded="false" aria-controls="collapse">
                <img src="{{ asset('picture/Gereja.jpg') }}" alt="" class="img-thumbnail">
                <div class="title fw-bolder fs-6 text-white text-center">Visi</div>
                <div class="collapse text-white" id="collapse-visi">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, dignissimos sunt inventore
                    totam praesentium porro rerum. Ipsa error quos vero mollitia laborum? Quaerat veniam error
                    porro
                    ea, eligendi quia et!
                </div>
            </div>
        </div>

        <div class="right col-lg-6 col-12 p-2 hvr-shrink">
            <div class="bg-primary rounded-3 shadow-lg p-2" data-bs-toggle="collapse" data-bs-target="#collapse-misi"
                aria-expanded="false" aria-controls="collapse">
                <img src="{{ asset('picture/Gereja.jpg') }}" alt="" class="img-thumbnail">
                <div class="title fw-bolder fs-6 text-white text-center">Misi</div>
                <div class="collapse text-white" id="collapse-misi">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, dignissimos sunt inventore
                    totam praesentium porro rerum. Ipsa error quos vero mollitia laborum? Quaerat veniam error
                    porro
                    ea, eligendi quia et!
                </div>
            </div>
        </div>
    </div>

    {{-- Sejarah --}}
    <div class="fs-5 fw-bolder ps-2">Sejarah Gereja</div>
    <div class="row mx-auto mb-3">
        <div class="col-lg-3 col-6 px-2 mb-2 hvr-shrink">
            <div class="card bg-primary rounded-3 shadow-lg" data-bs-toggle="collapse" data-bs-target="#collapse-sejarah-1">
                <img src="{{ asset('picture/Gereja.jpg') }}" class="card-img-top h-100" alt="...">
                <div class="card-body">
                    <div class="text-center">
                        <div class="fs-4 fw-bolder text-white">1999</div>
                        <div class="fs-5 fw-bolder text-white mb-3">Pembangunan</div>
                        {{-- <div class="d-flex justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chevron-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                            </svg>
                        </div> --}}
                    </div>
                    <div class="collapse text-white" id="collapse-sejarah-1">
                        Some quick example text to build on the card title and make up the bulk of the
                        card's content.
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 px-2 mb-2 hvr-shrink">
            <div class="card bg-primary rounded-3 shadow-lg" data-bs-toggle="collapse" data-bs-target="#collapse-sejarah-2">
                <img src="{{ asset('picture/Gereja.jpg') }}" class="card-img-top h-100" alt="...">
                <div class="card-body">
                    <div class="text-center">
                        <div class="fs-4 fw-bolder text-white">1999</div>
                        <div class="fs-5 fw-bolder text-white mb-3">Pembangunan</div>
                        {{-- <div class="d-flex justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chevron-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                            </svg>
                        </div> --}}
                    </div>
                    <div class="collapse text-white" id="collapse-sejarah-2">
                        Some quick example text to build on the card title and make up the bulk of the
                        card's content.
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 px-2 mb-2 hvr-shrink">
            <div class="card bg-primary rounded-3 shadow-lg" data-bs-toggle="collapse" data-bs-target="#collapse-sejarah-3">
                <img src="{{ asset('picture/Gereja.jpg') }}" class="card-img-top h-100" alt="...">
                <div class="card-body">
                    <div class="text-center">
                        <div class="fs-4 fw-bolder text-white">1999</div>
                        <div class="fs-5 fw-bolder text-white mb-3">Pembangunan</div>
                        {{-- <div class="d-flex justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chevron-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                            </svg>
                        </div> --}}
                    </div>
                    <div class="collapse text-white" id="collapse-sejarah-3">
                        Some quick example text to build on the card title and make up the bulk of the
                        card's content.
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6 px-2 mb-2 hvr-shrink">
            <div class="card bg-primary rounded-3 shadow-lg" data-bs-toggle="collapse" data-bs-target="#collapse-sejarah-4">
                <img src="{{ asset('picture/Gereja.jpg') }}" class="card-img-top h-100" alt="...">
                <div class="card-body">
                    <div class="text-center">
                        <div class="fs-4 fw-bolder text-white">1999</div>
                        <div class="fs-5 fw-bolder text-white mb-3">Pembangunan</div>
                        {{-- <div class="d-flex justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chevron-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                            </svg>
                        </div> --}}
                    </div>
                    <div class="collapse text-white" id="collapse-sejarah-4">
                        Some quick example text to build on the card title and make up the bulk of the
                        card's content.
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
