<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@extends('Layout.profileTemplate')
@section('title', 'Pastor')
@section('content')
    <div class="row mx-auto mb-2">
        <div class="col-lg-6 col-12 p-2">
            <div class="bg-primary rounded-3 shadow-lg p-2" data-bs-toggle="modal" data-bs-target="#pastor-a">
                <img src="{{ asset('picture/Gereja.jpg') }}" alt="" class="img-fluid rounded-3">
                <div class="fs-6">
                    <div class="w-50 mx-auto fw-bolder text-center text-white">Pastor A</div>
                </div>
                <div class="modal fade" id="pastor-a" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="pastor-a" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="pastor-a">Pastor A</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
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
                                <div class="biodata mb-2">
                                    <div class="head fs-5 fw-bolder">Biodata</div>
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-lg-2 col-3">Nama</div>
                                            <div class="col-lg-10 col-9">: Loremmmmm</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-2 col-3">Tempat Tanggal Lahir</div>
                                            <div class="col-lg-10 col-9">: Loremmmmm</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pengalaman mb-2">
                                    <div class="head fs-5 fw-bolder">Pengalaman</div>
                                    <div class="content">
                                        Lorem ipsum, dolor sit amet consectetur adipisicing
                                        elit. Ipsum nemo delectus
                                        assumenda labore sequi mollitia, praesentium aliquam autem voluptates doloremque
                                        dolore saepe cupiditate,
                                        libero sint quaerat cumque ut eligendi voluptate.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
