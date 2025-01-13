@extends('admin.layout.template')
@section('title', 'Perbarui Data Doa')

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
                            <h2 class="card-title text-center mb-4 fw-bolder">Perbarui Data Doa</h2>
                            <form action="/admin/edit-doa/{{ $doa->id_doa }}" method="POST" enctype="multipart/form-data">
                                @csrf <!-- Laravel CSRF Token -->
                                @method('PUT') <!-- Laravel method spoofing -->

                                <!-- Nama -->
                                <div class="mb-3">
                                    <label for="nama_doa" class="form-label">Nama Doa</label>
                                    <input type="text" class="form-control @error('nama_doa') is-invalid @enderror"
                                        id="nama_doa" name="nama_doa" value="{{ old('nama_doa', $doa->nama_doa) }}"
                                        required>
                                    @error('nama_doa')
                                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Deskripsi -->
                                <div class="mb-3">
                                    <label for="deskripsi_doa" class="form-label">Deskripsi Doa</label>
                                    <textarea class="form-control @error('deskripsi_doa') is-invalid @enderror" id="deskripsi_doa" name="deskripsi_doa"
                                        rows="5" required>{{ old('deskripsi_doa', $doa->deskripsi_doa) }}</textarea>
                                    @error('deskripsi_doa')
                                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Ayat Renungan -->
                                <div class="mb-3">
                                    <label for="ayat_renungan" class="form-label">Ayat Renungan</label>
                                    <textarea class="form-control @error('ayat_renungan') is-invalid @enderror" id="ayat_renungan" name="ayat_renungan"
                                        rows="5" required>{{ old('ayat_renungan', $doa->ayat_renungan) }}</textarea>
                                    @error('ayat_renungan')
                                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Isi Renungan -->
                                <div class="mb-3">
                                    <label for="isi_renungan" class="form-label">Isi Renungan</label>
                                    <textarea class="form-control @error('isi_renungan') is-invalid @enderror" id="isi_renungan" name="isi_renungan"
                                        rows="5" required>{{ old('isi_renungan', $doa->isi_renungan) }}</textarea>
                                    @error('isi_renungan')
                                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Ayat Tambahan -->
                                <div class="mb-3">
                                    <label for="ayat_tambahan" class="form-label">Ayat Tambahan</label>
                                    <textarea class="form-control @error('ayat_tambahan') is-invalid @enderror" id="ayat_tambahan" name="ayat_tambahan"
                                        rows="5">{{ old('ayat_tambahan', $doa->ayat_tambahan) }}</textarea>
                                    @error('ayat_tambahan')
                                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Gambar -->
                                <div class="mb-3">
                                    <label for="foto" class="form-label">Gambar Doa</label>
                                    <div>
                                        <img id="current-image"
                                            src="{{ $doa->path ? asset('storage/' . $doa->path) : asset('picture/Gereja.jpg') }}"
                                            alt="Gambar Doa" class="img-fluid rounded-3 mb-2 w-100">
                                    </div>
                                    <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                        id="foto" name="foto" onchange="previewImage(event)">
                                    @error('foto')
                                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tombol Submit -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success">Perbarui Data Doa</button>
                                    <a href="/admin/doa" class="btn btn-danger mt-2">Batal</a>
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
