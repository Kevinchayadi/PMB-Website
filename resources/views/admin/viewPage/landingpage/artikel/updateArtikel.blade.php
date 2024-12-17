@extends('admin.layout.template')
@section('title', 'Artikel - Form')

@section('content')
    <div class="container-fluid">
        <div class=" min-vh-100 d-flex flex-column align-items-center justify-content-center ">
            <div class="row w-100 justify-content-center">
                <div class="col-10 col-md-8">
                    <div class="card bg-primary shadow-lg rounded-4">
                        <div class="card-body text-white">

                            <h2 class="card-title text-center mb-4 fw-bolder">Edit Artikel</h2>
                            <form action="/admin/edit-artikel/{id}" method="PUT">
                                @csrf <!-- Laravel CSRF Token -->

                                <!-- Nama -->
                                <!-- Nama -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Judul Artikel</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Masukkan judul artikel" required>
                                </div>

                                <!-- Deskripsi -->
                                <div class="mb-3">
                                    <label for="desc" class="form-label">Deskripsi Artikel</label>
                                    <textarea class="form-control" id="desc" name="desc" placeholder="Masukkan deskripsi Artikel" rows="20"
                                        required></textarea>
                                </div>

                                <!-- gambar -->
                                <div class="mb-3">
                                    <label for="file" class="form-label">Gambar</label>
                                    <input type="file" class="form-control" id="file" name="file"
                                        placeholder="Masukkan gambar" required>
                                </div>

                                {{-- additional link --}}
                                <div class="mb-3">
                                    <label for="link" class="form-label">Link Artikel (Opsional)</label>
                                    <input type="text" class="form-control" id="link" name="link"
                                        placeholder="Masukkan link artikel">
                                </div>

                                <!-- Tombol Submit -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a class=" btn btn-danger rounded-none mt-2" href="/admin/artikel"> cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
