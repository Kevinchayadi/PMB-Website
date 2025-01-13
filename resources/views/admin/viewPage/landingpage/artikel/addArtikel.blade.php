@extends('admin.layout.template')
@section('title', 'Tambah Artikel Baru')

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
        <div class="min-vh-100 d-flex flex-column align-items-center justify-content-center">
            <div class="row w-100 justify-content-center">
                <div class="col-10 col-md-8">
                    <div class="card bg-primary shadow-lg rounded-4">
                        <div class="card-body text-white">
                            <h2 class="card-title text-center mb-4 fw-bolder">Tambah Artikel Baru</h2>
                            <form action="/admin/add-artikel" method="POST" enctype="multipart/form-data">
                                @csrf <!-- Laravel CSRF Token -->

                                <!-- Nama -->
                                <div class="mb-3">
                                    <label for="title" class="form-label">Judul Artikel<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" placeholder="Masukkan judul artikel"
                                        value="{{ old('title') }}" required>
                                    @error('title')
                                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Deskripsi -->
                                <div class="mb-3">
                                    <label for="body" class="form-label">Deskripsi Artikel<span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body"
                                        placeholder="Masukkan deskripsi Artikel" rows="20" required>{{ old('body') }}</textarea>
                                    @error('body')
                                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Additional Link -->
                                <div class="mb-3">
                                    <label for="additionalLink" class="form-label">Link Artikel
                                        (Opsional)</label>
                                    <input type="text" class="form-control @error('additionalLink') is-invalid @enderror"
                                        id="additionalLink" name="additionalLink"
                                        placeholder="Masukkan additionalLink artikel" value="{{ old('additionalLink') }}">
                                    @error('additionalLink')
                                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Gambar -->
                                <div class="mb-3">
                                    <label for="file" class="form-label">Gambar Artikel<span
                                            class="text-danger">*</span></label>
                                    <div>
                                        <!-- Menampilkan gambar default -->
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
                                    <button type="submit" class="btn btn-success">Tambah Artikel Baru</button>
                                    <a class="btn btn-danger rounded-none mt-2" href="/admin/artikel">Batal</a>
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
