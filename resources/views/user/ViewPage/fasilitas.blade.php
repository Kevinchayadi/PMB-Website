<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<link rel="stylesheet" href="{{ asset('css/image.css') }}">
@extends('user.Layout.profileTemplate')
@section('title', 'Fasilitas')
@section('content')
    <div class="row mb-2 mx-auto justify-content-center">
        {{-- Gereja --}}
        <div class="col-lg-6 col-12 p-2">
            <div class="rounded-3 bg-primary shadow-lg p-2 hvr-shrink h-100" data-bs-toggle="modal"
                data-bs-target="#fasilitas-a">
                <img src="{{ asset('picture/Gereja.jpg') }}" alt="" class="img-fluid custom-img rounded">
                <div class="fs-6">
                    <div class="w-50 mx-auto fw-bolder text-center text-white">Gereja</div>
                </div>
            </div>
            <div class="modal fade" id="fasilitas-a" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="fasilitas-a" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header bg-primary bg-primary">
                            <h1 class="modal-title fs-5 text-white" id="fasilitas-a">Gereja</h1>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="image mb-2">
                                <img src="{{ asset('picture/Gereja.jpg') }}" alt=""
                                    class="img-fluid rounded-3 shadow-lg">
                            </div>
                            <div class="description">
                                Tempat utama untuk ibadah, misa, dan kegiatan liturgi.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Gedung Karya Pastoral --}}
        <div class="col-lg-6 col-12 p-2">
            <div class="rounded-3 bg-primary shadow-lg p-2 hvr-shrink h-100" data-bs-toggle="modal"
                data-bs-target="#fasilitas-b">
                <img src="{{ asset('picture/GedungKarya.jpg') }}" alt="" class="img-fluid custom-img rounded">
                <div class="fs-6">
                    <div class="w-50 mx-auto fw-bolder text-center text-white">Gedung Karya Pastoral</div>
                </div>
            </div>
            <div class="modal fade" id="fasilitas-b" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="fasilitas-b" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header bg-primary bg-primary">
                            <div class="modal-title fs-5 text-white" id="fasilitas-b">Gedung Karya Pastoral</div>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="image mb-2">
                                <img src="{{ asset('picture/GedungKarya.jpg') }}" alt=""
                                    class="img-fluid rounded-3 shadow-lg">
                            </div>
                            <div class="description">
                                Ruang yang digunakan untuk kegiatan pastoral, pertemuan, dan pendidikan agama.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Pieta --}}
        <div class="col-lg-6 col-12 p-2">
            <div class="rounded-3 bg-primary shadow-lg p-2 hvr-shrink h-100" data-bs-toggle="modal"
                data-bs-target="#fasilitas-c">
                <img src="{{ asset('picture/Pieta.jpg') }}" alt="" class="img-fluid custom-img rounded">
                <div class="fs-6">
                    <div class="w-50 mx-auto fw-bolder text-center text-white">Pieta</div>
                </div>
            </div>
            <div class="modal fade" id="fasilitas-c" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="fasilitas-c" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <div class="modal-title fs-5 text-white" id="fasilitas-c">Pieta</div>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="image mb-2">
                                <img src="{{ asset('picture/Pieta.jpg') }}" alt=""
                                    class="img-fluid rounded-3 shadow-lg">
                            </div>
                            <div class="description">
                                Patung atau lukisan yang menggambarkan Maria yang memegang tubuh Yesus setelah penyaliban,
                                sering menjadi tempat refleksi dan doa.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Pastoran --}}
        <div class="col-lg-6 col-12 p-2">
            <div class="rounded-3 bg-primary shadow-lg p-2 hvr-shrink h-100" data-bs-toggle="modal"
                data-bs-target="#fasilitas-d">
                <img src="{{ asset('picture/Pastoran.jpg') }}" alt="" class="img-fluid custom-img rounded">
                <div class="fs-6">
                    <div class="w-50 mx-auto fw-bolder text-center text-white">Pastoran</div>
                </div>
            </div>
            <div class="modal fade" id="fasilitas-d" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="fasilitas-d" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <div class="modal-title fs-5 text-white" id="fasilitas-d">Pastoran</div>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="image mb-2">
                                <img src="{{ asset('picture/Pastoran.jpg') }}" alt=""
                                    class="img-fluid rounded-3 shadow-lg">
                            </div>
                            <div class="description">
                                Tempat tinggal dan kantor pastor serta tim pastoral.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Parkiran --}}
        <div class="col-lg-6 col-12 p-2">
            <div class="rounded-3 bg-primary shadow-lg p-2 hvr-shrink h-100" data-bs-toggle="modal"
                data-bs-target="#fasilitas-e">
                <img src="{{ asset('picture/Parkiran.jpg') }}" alt="" class="img-fluid custom-img rounded">
                <div class="fs-6">
                    <div class="w-50 mx-auto fw-bolder text-center text-white">Parkiran</div>
                </div>
            </div>
            <div class="modal fade" id="fasilitas-e" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="fasilitas-e" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <div class="modal-title fs-5 text-white" id="fasilitas-e">Parkiran</div>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="image mb-2">
                                <img src="{{ asset('picture/Parkiran.jpg') }}" alt=""
                                    class="img-fluid rounded-3 shadow-lg">
                            </div>
                            <div class="description">
                                Area yang disediakan untuk parkir kendaraan jemaat dan pengunjung.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Ruang Kegiatan --}}
        <div class="col-lg-6 col-12 p-2">
            <div class="rounded-3 bg-primary shadow-lg p-2 hvr-shrink h-100" data-bs-toggle="modal"
                data-bs-target="#fasilitas-f">
                <img src="{{ asset('picture/RuangKegiatan.jpg') }}" alt="" class="img-fluid custom-img rounded">
                <div class="fs-6">
                    <div class="w-50 mx-auto fw-bolder text-center text-white">Ruang Kegiatan</div>
                </div>
            </div>
            <div class="modal fade" id="fasilitas-f" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="fasilitas-f" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <div class="modal-title fs-5 text-white" id="fasilitas-f">Ruang Kegiatan</div>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="image mb-2">
                                <img src="{{ asset('picture/RuangKegiatan.jpg') }}" alt=""
                                    class="img-fluid rounded-3 shadow-lg">
                            </div>
                            <div class="description">
                                Ruangan yang digunakan untuk kegiatan komunitas, seperti pertemuan keluarga, seminar, atau
                                pelatihan.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Ruang Doa --}}
        <div class="col-lg-6 col-12 p-2">
            <div class="rounded-3 bg-primary shadow-lg p-2 hvr-shrink h-100" data-bs-toggle="modal"
                data-bs-target="#fasilitas-g">
                <img src="{{ asset('picture/RuangDoa.jpeg') }}" alt="" class="img-fluid custom-img rounded">
                <div class="fs-6">
                    <div class="w-50 mx-auto fw-bolder text-center text-white">Ruang Doa atau Kapel</div>
                </div>
            </div>
            <div class="modal fade" id="fasilitas-g" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="fasilitas-g" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <div class="modal-title fs-5 text-white" id="fasilitas-g">Ruang Doa atau Kapel</div>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="image mb-2">
                                <img src="{{ asset('picture/RuangDoa.jpeg') }}" alt=""
                                    class="img-fluid rounded-3 shadow-lg">
                            </div>
                            <div class="description">
                                Ruang kecil untuk ibadah pribadi atau doa hening.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
