@extends('admin.layout.template')
@section('title', 'Kegiatan - Form')

@section('content')
    <div>

    </div>
    <div class="container-fluid">
        <div class=" min-vh-100 d-flex flex-column align-items-center justify-content-center ">
            <div class="row w-100 justify-content-center">
                <div class="col-10 col-md-8">
                    <div class="card bg-primary shadow-lg rounded-4">
                        <div class="card-body text-white">

                            <h2 class="card-title text-center mb-4 fw-bolder">Create New Kegiatan</h2>
                            <form action="/admin/add-kegiatan" method="POST">
                                @csrf <!-- Laravel CSRF Token -->

                                <!-- Nama -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Kegiatan</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Masukkan nama kegiatan" required>
                                </div>

                                <!-- Deskripsi -->
                                <div class="mb-3">
                                    <label for="desc" class="form-label">Deskripsi Kegiatan</label>
                                    <input type="text" class="form-control" id="desc" name="desc"
                                        placeholder="Masukkan deskripsi kegiatan" required>
                                </div>

                                <!-- gambar -->
                                <div class="mb-3">
                                    <label for="file" class="form-label">Gambar</label>
                                    <input type="file" class="form-control" id="file" name="file"
                                        placeholder="Masukkan gambar" required>
                                </div>

                                <!-- Tombol Submit -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <a class=" btn btn-danger rounded-none mt-2" href="/admin/kegiatan"> cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
