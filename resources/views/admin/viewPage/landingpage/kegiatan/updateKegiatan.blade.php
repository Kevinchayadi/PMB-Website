@extends('admin.layout.template')
@section('title', 'Kegiatan - Form')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container-fluid">
        <div class=" min-vh-100 d-flex flex-column align-items-center justify-content-center ">
            <div class="row w-100 justify-content-center">
                <div class="col-10 col-md-8">
                    <div class="card bg-primary shadow-lg rounded-4">
                        <div class="card-body text-white">

                            <h2 class="card-title text-center mb-4 fw-bolder">Edit Kegiatan</h2>
                            <form action="/admin/edit-kegiatan/{id}" method="PUT">
                                @csrf <!-- Laravel CSRF Token -->

                                <!-- Nama -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Kegiatan<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" placeholder="Masukkan nama kegiatan" required>
                                    @error('name')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Deskripsi -->
                                <div class="mb-3">
                                    <label for="desc" class="form-label">Deskripsi Kegiatan<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('desc') is-invalid @enderror"
                                        id="desc" name="desc" placeholder="Masukkan deskripsi kegiatan" required>
                                    @error('desc')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- gambar -->
                                <div class="mb-3">
                                    <label for="foto" class="form-label">Gambar<span
                                            class="text-danger">*</span></label>

                                    <!-- Menampilkan gambar yang ada -->
                                    @if ($kegiatan->path)
                                        <img src="{{ asset('storage/' . $kegiatan->path) }}" alt="Gambar_Kegiatan"
                                            class="img-fluid rounded-3 mb-2" id="current-image">
                                    @else
                                        <img src="{{ asset('picture/Gereja.jpg') }}" alt="Gambar Default"
                                            class="img-fluid rounded-3 mb-2" id="current-image">
                                    @endif

                                    <!-- Input file untuk mengganti gambar -->
                                    <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                        id="foto" name="foto" placeholder="Edit gambar"
                                        onchange="previewImage(event)" required>
                                    @error('foto')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tombol Submit -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a class=" btn btn-danger rounded-none mt-2" href="/admin/kegiatan"> cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- JavaScript untuk Preview Gambar -->
    <script src="{{ asset('js/preview.js') }}"></script>
@endsection
