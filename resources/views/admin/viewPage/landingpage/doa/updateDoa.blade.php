@extends('admin.layout.template')
@section('title', 'Doa - Form')

@section('content')
    <div class="container-fluid">
        <div class="min-vh-100 d-flex flex-column align-items-center justify-content-center">
            <div class="row w-100 justify-content-center">
                <div class="col-10 col-md-8">
                    <div class="card bg-primary shadow-lg rounded-4">
                        <div class="card-body text-white">
                            <h2 class="card-title text-center mb-4 fw-bolder">Edit Doa</h2>
                            <form action="/admin/edit-doa/{{ $doa->id_doa }}" method="POST" enctype="multipart/form-data">
                                @csrf <!-- Laravel CSRF Token -->
                                @method('PUT') <!-- Laravel method spoofing -->

                                <!-- Nama -->
                                <div class="mb-3">
                                    <label for="nama_doa" class="form-label">Nama Doa</label>
                                    <input type="text" class="form-control" id="nama_doa" name="nama_doa"
                                        value="{{ old('nama_doa', $doa->nama_doa) }}" required>
                                </div>

                                <!-- Deskripsi -->
                                <div class="mb-3">
                                    <label for="deskripsi_doa" class="form-label">Deskripsi Doa</label>
                                    <textarea class="form-control" id="deskripsi_doa" name="deskripsi_doa" rows="5" required>{{ old('deskripsi_doa', $doa->deskripsi_doa) }}</textarea>
                                </div>

                                <!-- Ayat Renungan -->
                                <div class="mb-3">
                                    <label for="ayat_renungan" class="form-label">Ayat Renungan</label>
                                    <textarea class="form-control" id="ayat_renungan" name="ayat_renungan" rows="5" required>{{ old('ayat_renungan', $doa->ayat_renungan) }}</textarea>
                                </div>

                                <!-- Isi Renungan -->
                                <div class="mb-3">
                                    <label for="isi_renungan" class="form-label">Isi Renungan</label>
                                    <textarea class="form-control" id="isi_renungan" name="isi_renungan" rows="5" required>{{ old('isi_renungan', $doa->isi_renungan) }}</textarea>
                                </div>

                                <!-- Ayat Tambahan -->
                                <div class="mb-3">
                                    <label for="ayat_tambahan" class="form-label">Ayat Tambahan</label>
                                    <textarea class="form-control" id="ayat_tambahan" name="ayat_tambahan" rows="5">{{ old('ayat_tambahan', $doa->ayat_tambahan) }}</textarea>
                                </div>

                                <!-- Gambar -->
                                <div class="mb-3">
                                    <label for="foto" class="form-label">Gambar</label>
                                    <div>
                                        <img id="current-image" 
                                            src="{{ $doa->path ? asset( 'storage/' . $doa->path) : asset('picture/Gereja.jpg') }}" 
                                            alt="Gambar Doa" 
                                            class="img-fluid rounded-3 mb-2">
                                    </div>
                                    <input type="file" class="form-control" id="foto" name="foto" onchange="previewImage(event)">
                                </div>

                                <!-- Tombol Submit -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a href="/admin/doa" class="btn btn-danger mt-2">Cancel</a>
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
