@extends('admin.layout.template')
@section('title', 'layanan - Form')

@section('content')
    <div class="container-fluid">
        <div class=" min-vh-100 d-flex flex-column align-items-center justify-content-center ">
            <div class="row w-100 justify-content-center">
                <div class="col-10 col-md-8">
                    <div class="card bg-primary shadow-lg rounded-4">
                        <div class="card-body text-white">

                            <h2 class="card-title text-center mb-4 fw-bolder">Edit Layanan</h2>
                            <form action="/admin/edit-layanan/{id}" method="PUT">
                                @csrf <!-- Laravel CSRF Token -->

                                <!-- Nama -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Layanan</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="{{ $acara->nama_acara }}" required>
                                </div>

                                <!-- Type -->
                                <div class="mb-3">
                                    <label for="type" class="form-label">Tipe Layanan (Liturgi/Sakramen)</label>
                                    <input type="text" class="form-control" id="type" name="type"
                                        placeholder="{{ $acara->tipe_acara }}" required></textarea>
                                </div>

                                <!-- Deskripsi -->
                                <div class="mb-3">
                                    <label for="desc" class="form-label">Deskripsi Layanan</label>
                                    <input type="text" class="form-control" id="desc" name="desc"
                                        placeholder="{{ $acara->deskripsi_acara }}" required>
                                </div>

                                <!-- gambar -->
                                <div class="mb-3">
                                    <label for="file" class="form-label">Gambar</label>
                                    <img src="{{ asset('picture/Gereja.jpg') }}" alt="" class="img-fluid rounded-3">
                                    <input type="file" class="form-control" id="file" name="file"
                                        placeholder="Edit gambar" required>
                                </div>

                                <!-- Tombol Submit -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a class=" btn btn-danger rounded-none mt-2" href="/admin/layanan">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
