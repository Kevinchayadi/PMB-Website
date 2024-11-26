@extends('user.Layout.template')
@section('title', 'Layanan')

@section('content')
    {{-- <script src="{{ asset('js/layanan.js') }}"></script>
    <script>
        AOS.init()
    </script> --}}
    <link rel="stylesheet" href="{{ asset('css/layanan.css') }}">
    <div class="container-fluid row mx-auto">
        <div class="col-lg-4 col-12 p-2">
            <div class="bg-primary rounded p-2" data-bs-toggle="modal" data-bs-target="#doaabcde">
                {{-- Gambar --}}
                <img class="img-fluid rounded-3 mb-2" src="{{ asset('picture/Gereja.jpg') }}" alt="">

                {{-- Description --}}
                <div class="fs-6">
                    <div class="w-50 mx-auto fw-bolder text-center text-white">Layanan A</div>
                </div>
            </div>
            <div class="modal fade" id="doaabcde" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="doaabcde" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h1 class="modal-title fs-5 text-white" id="doaabcde">Layanan A</h1>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Et architecto accusantium officiis
                            tempore
                            consequatur porro qui magnam reiciendis alias, quibusdam ullam cumque enim earum! Deleniti
                            cupiditate quaerat totam repellendus officiis.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab commodi et est saepe optio quaerat
                            quisquam eaque tenetur hic placeat eius ut beatae, at sunt quidem? Quisquam expedita
                            necessitatibus
                            quidem.
                        </div>

                        <div class="modal-btn text-center mb-2">
                            <a class="btn btn-outline-primary text-primary bg-white" data-bs-toggle="modal"
                                data-bs-target="#form-a">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="form-a" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="form-a" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h1 class="modal-title fs-5 text-white" id="form-a">Daftar Layanan A</h1>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="Terlibat-1" class="form-label">Nama Terlibat 1</label>
                                    <input type="text" class="form-control" id="Terlibat-1"
                                        placeholder="Contoh: John Smith" required>
                                </div>

                                <div class="mb-3">
                                    <label for="Terlibat-2" class="form-label">Nama Terlibat 2</label>
                                    <input type="text" class="form-control" id="Terlibat-2"
                                        placeholder="Contoh: John Smith">
                                </div>

                                <div class="mb-3">
                                    <label for="Romo" class="form-label">Nama Romo</label>
                                    <input type="text" class="form-control" id="Romo"
                                        placeholder="Contoh: John Smith">
                                </div>

                                <div class="mb-3">
                                    <label for="Jadwal" class="form-label">Jadwal Acara</label>
                                    <input type="date" class="form-control" id="Jadwal">
                                </div>

                                <div class="mb-3">
                                    <label for="Description" class="form-label">Catatan</label>
                                    <textarea class="form-control" id="Description" rows="3" placeholder="Contoh: Tolong segera diproses nya"></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
