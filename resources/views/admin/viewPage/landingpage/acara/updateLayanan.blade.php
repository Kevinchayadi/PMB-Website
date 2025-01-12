@extends('admin.layout.template')
@section('title', 'Perbarui Data Layanan')

@section('content')
    <div class="container-fluid my-3">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Terjadi Kesalahan!</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="min-vh-100 d-flex flex-column align-items-center justify-content-center">
            <div class="row w-100 justify-content-center">
                <div class="col-10 col-md-8">
                    <div class="card bg-primary shadow-lg rounded-4">
                        <div class="card-body text-white">

                            <h2 class="card-title text-center mb-4 fw-bolder">Perbarui Data Layanan</h2>

                            <!-- Form Edit Layanan -->
                            <form action="{{ secure_url('/admin/edit-layanan/' . $acara->slug) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Nama Layanan -->
                                <div class="mb-3">
                                    <label for="nama_acara" class="form-label">Nama Layanan<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nama_acara') is-invalid @enderror"
                                        id="nama_acara" name="nama_acara"
                                        value="{{ old('nama_acara', $acara->nama_acara) }}" required>
                                    @error('nama_acara')
                                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tipe Layanan -->
                                <div class="mb-3">
                                    <label for="tipe_acara" class="form-label">Tipe Layanan (Liturgi/Sakramen)<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('tipe_acara') is-invalid @enderror"
                                        id="tipe_acara" name="tipe_acara"
                                        value="{{ old('tipe_acara', $acara->tipe_acara) }}" required>
                                    @error('tipe_acara')
                                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Deskripsi Layanan -->
                                <div class="mb-3">
                                    <label for="desc" class="form-label">Deskripsi Layanan<span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control @error('deskripsi_acara') is-invalid @enderror" id="desc" name="deskripsi_acara"
                                        rows="5" required>{{ old('deskripsi_acara', $acara->deskripsi_acara) }}</textarea>
                                    @error('deskripsi_acara')
                                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Gambar -->
                                <div class="mb-3">
                                    <label for="foto" class="form-label">Gambar Layanan</label>

                                    <!-- Menampilkan gambar yang ada -->
                                    <div>
                                        <img src="{{ asset('storage/' . $acara->path) }}" alt="Gambar_Layanan"
                                            class="img-fluid rounded-3 mb-2 w-100" id="current-image">
                                    </div>


                                    <!-- Input file untuk mengganti gambar -->
                                    <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                        id="foto" name="foto" placeholder="Edit gambar"
                                        onchange="previewImage(event)">
                                    @error('foto')
                                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tombol Submit -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success">Perbarui Data Layanan</button>
                                    <a href="{{ route('admin.acara') }}" class="btn btn-danger rounded-none mt-2">Batal</a>
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
