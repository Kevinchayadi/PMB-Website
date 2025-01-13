@extends('admin.layout.template')
@section('title', 'Tambah Kegiatan Baru')

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

    <div class="container-fluid my-3">
        <div class=" min-vh-100 d-flex flex-column align-items-center justify-content-center ">
            <div class="row w-100 justify-content-center">
                <div class="col-10 col-md-8">
                    <div class="card bg-primary shadow-lg rounded-4">
                        <div class="card-body text-white">

                            <h2 class="card-title text-center mb-4 fw-bolder">Tambah Kegiatan Baru</h2>
                            <form action="/admin/add-kegiatan" method="POST" enctype="multipart/form-data">
                                @csrf <!-- Laravel CSRF Token -->

                                <!-- Nama -->
                                <div class="mb-3">
                                    <label for="title" class="form-label">Nama Kegiatan<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" placeholder="Masukkan nama kegiatan" required>
                                    @error('title')
                                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Deskripsi -->
                                <div class="mb-3">
                                    <label for="description" class="form-label">Deskripsi Kegiatan<span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                        placeholder="Masukkan deskripsi kegiatan" required></textarea>
                                    @error('description')
                                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Location -->
                                <div class="mb-3">
                                    <label for="location" class="form-label">Lokasi Kegiatan<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('location') is-invalid @enderror"
                                        id="location" name="location" placeholder="Masukkan lokasi kegiatan" required>
                                    @error('location')
                                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tanggal -->
                                <div class="mb-3">
                                    <label for="date" class="form-label">Tanggal Kegiatan<span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('date') is-invalid @enderror"
                                        id="date" name="date" placeholder="Masukkan tanggal kegiatan" required>
                                    @error('date')
                                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- gambar -->
                                <div class="mb-3">
                                    <label for="file" class="form-label">Foto Kegiatan<span
                                            class="text-danger">*</span></label>

                                    <!-- Menampilkan gambar yang ada -->
                                    <div>
                                        <img src="{{ asset('picture/Gereja.jpg') }}" alt="Gambar Default"
                                            class="img-fluid rounded-3 mb-2 w-100" id="current-image">
                                    </div>

                                    <!-- Input file untuk mengganti gambar -->
                                    <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                        id="foto" name="foto" placeholder="Masukkan gambar"
                                        onchange="previewImage(event)" required>
                                    @error('foto')
                                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tombol Submit -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success">Tambah Kegiatan Baru</button>
                                    <a class=" btn btn-danger rounded-none mt-2" href="/admin/kegiatan">Batal</a>
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
