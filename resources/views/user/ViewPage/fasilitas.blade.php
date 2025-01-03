<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@extends('user.Layout.profileTemplate')
@section('title', 'Fasilitas')
@section('content')
    <div class="row mb-2 mx-auto">
        <div class="col-lg-6 col-12 p-2">
            <div class="rounded-3 bg-primary shadow-lg p-2 hvr-shrink" data-bs-toggle="modal" data-bs-target="#fasilitas-a">
                <img src="{{ asset('picture/Gereja.jpg') }}" alt="" class="img-fluid rounded">
                <div class="fs-6">
                    <div class="w-50 mx-auto fw-bolder text-center text-white">Fasilitas A</div>
                </div>
            </div>
            <div class="modal fade" id="fasilitas-a" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="fasilitas-a" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="fasilitas-a">Fasilitas A</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="image mb-2">
                                <img src="{{ asset('picture/Gereja.jpg') }}" alt=""
                                    class="img-fluid rounded-3 shadow-lg">
                            </div>
                            <div class="description">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Et architecto accusantium
                                officiis
                                tempore
                                consequatur porro qui magnam reiciendis alias, quibusdam ullam cumque enim earum!
                                Deleniti
                                cupiditate quaerat totam repellendus officiis.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab commodi et est saepe optio
                                quaerat
                                quisquam eaque tenetur hic placeat eius ut beatae, at sunt quidem? Quisquam expedita
                                necessitatibus
                                quidem.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-12 p-2">
            <div class="rounded-3 bg-primary shadow-lg p-2 hvr-shrink" data-bs-toggle="modal" data-bs-target="#fasilitas-b">
                <img src="{{ asset('picture/Gereja.jpg') }}" alt="" class="img-fluid rounded">
                <div class="fs-6">
                    <div class="w-50 mx-auto fw-bolder text-center text-white">Fasilitas A</div>
                </div>
            </div>
            <div class="modal fade" id="fasilitas-b" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="fasilitas-b" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="fasilitas-b">Fasilitas B</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="image mb-2">
                                <img src="{{ asset('picture/Gereja.jpg') }}" alt=""
                                    class="img-fluid rounded-3 shadow-lg">
                            </div>
                            <div class="description">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Et architecto accusantium
                                officiis
                                tempore
                                consequatur porro qui magnam reiciendis alias, quibusdam ullam cumque enim earum!
                                Deleniti
                                cupiditate quaerat totam repellendus officiis.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab commodi et est saepe optio
                                quaerat
                                quisquam eaque tenetur hic placeat eius ut beatae, at sunt quidem? Quisquam expedita
                                necessitatibus
                                quidem.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
