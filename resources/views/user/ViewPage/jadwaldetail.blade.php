@extends('user.Layout.template')
@section('title', 'Nama jadwal')

@section('content')
    <div class="container-fluid row">
        <div class="left col-3 d-lg-block d-none px-4 border-end">
            <div class="title fs-5 fw-bolder border-bottom">Did You Know?</div>
            <div class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, ipsa eum. Placeat
                voluptatibus consequatur itaque, laboriosam illum non quas ea reprehenderit suscipit culpa corporis
                similique, reiciendis excepturi ut consequuntur ullam.</div>
        </div>
        <div class="mid col-lg-9 col-12">
            {{-- Judul --}}
            <div class="head fs-4 fw-bolder mb-2">LOREM LOREM</div>

            {{-- Carousel --}}
            <div id="carouselExampleAutoplaying" class="carousel slide mb-10 w-75" data-bs-ride="carousel">
                <div class="carousel-inner rounded-3 shadow-lg">
                    <div class="carousel-item active ">
                        <img src="{{ asset('picture/Carousel-1.png') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('picture/Carousel-2.jpg') }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('picture/Carousel-3.png') }}" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            {{-- Deskripsi --}}
            <div class="description fs-5 fw-bolder mb-2">Deskripsi</div>
            <div class="content fs-6">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure autem incidunt ad culpa
                ea
                architecto consequatur quaerat dolor velit perspiciatis ab vero minima fuga eligendi, nesciunt optio
                suscipit
                laborum debitis.
            </div>

            {{-- Waktu dan tempat --}}
            <div class="description fs-5 fw-bolder mb-2">Waktu dan Tempat</div>
            <div class="waktu fs-6">Minggu, 24 Nov 2099</div>
            <div class="tempat fs-6">Di Gereja Santo Petrus dan Paulus</div>

            {{-- Tombol daftar --}}
            <div class="mt-3 btn btn-primary hvr-shrink" data-bs-toggle="modal" data-bs-target="#kegiatan-a">Ikut Kegiatan
                Ini</div>

            <div class="modal fade" id="kegiatan-a" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="kegiatan-a" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="kegiatan-a">Daftar Kegiatan A</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="InputName" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="InputName">
                                </div>

                                <div class="mb-3">
                                    <label for="InputEmail" class="form-label">Alamat Email</label>
                                    <input type="email" class="form-control" id="InputEmail">
                                </div>

                                <div class="mb-3">
                                    <label for="InputNumber" class="form-label">Nomor Telepon</label>
                                    <input type="number" class="form-control" id="InputNumber">
                                </div>

                                <button type="submit" class="btn btn-primary hvr-shrink">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="total fs-6 text-secondary mb-2">Sudah 60 orang yang mendaftar</div>

            <div class="other mb-2">
                <div class="title fs-5 fw-bolder">Lihat Jadwal Lainnya...</div>
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.
                                </p>
                                <a href="#" class="btn btn-primary hvr-shrink">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.
                                </p>
                                <a href="#" class="btn btn-primary hvr-shrink">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
