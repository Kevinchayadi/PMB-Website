@extends('admin.layout.template')
@section('title', 'Perbarui Data Kegiatan')

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

                            <h2 class="card-title text-center mb-4 fw-bolder">Perbarui Data Kegiatan</h2>
                            <form action="/admin/edit-kegiatan/{{ $kegiatan->id }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf <!-- Laravel CSRF Token -->
                                @method('PUT')

                                <!-- Nama -->
                                <div class="mb-3">
                                    <label for="title" class="form-label">Nama Kegiatan<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" value="{{ old('title', $kegiatan->title) }}" required>
                                    @error('title')
                                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Deskripsi -->
                                <div class="mb-3">
                                    <label for="description" class="form-label">Deskripsi Kegiatan<span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                        value="Masukkan deskripsi kegiatan" required>{{ old('description', $kegiatan->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Location -->
                                <div class="mb-3">
                                    <label for="location" class="form-label">Lokasi Kegiatan<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('location') is-invalid @enderror"
                                        id="location" name="location" value="{{ old('location', $kegiatan->location) }}"
                                        required>
                                    @error('location')
                                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tanggal -->
                                <div class="mb-3">
                                    <label for="date" class="form-label">Tanggal Kegiatan<span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('date') is-invalid @enderror"
                                        id="date" name="date" value="{{ old('date', $kegiatan->date) }}" required>
                                    @error('date')
                                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- gambar -->
                                <div class="mb-3">
                                    <label for="foto" class="form-label">Foto Kegiatan</label>

                                    <!-- Menampilkan gambar yang ada -->
                                    <div>
                                        <img src="{{ asset('storage/' . $kegiatan->path) }}" alt="Gambar_Kegiatan"
                                            class="img-fluid rounded-3 mb-2" id="current-image">
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
                                    <button type="submit" class="btn btn-success">Perbarui Data Kegiatan</button>
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
