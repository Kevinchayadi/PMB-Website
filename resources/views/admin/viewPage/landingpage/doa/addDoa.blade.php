@extends('admin.layout.template')
@section('title', 'Doa - Form')

@section('content')
    <div class="container-fluid">
        <div class="min-vh-100 d-flex flex-column align-items-center justify-content-center">
            <div class="row w-100 justify-content-center">
                <div class="col-10 col-md-8">
                    <div class="card bg-primary shadow-lg rounded-4">
                        <div class="card-body text-white">

                            <h2 class="card-title text-center mb-4 fw-bolder">Create New Doa</h2>

                            <!-- Tampilkan Error Global -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="/admin/add-doa" method="POST" enctype="multipart/form-data">
                                @csrf <!-- Laravel CSRF Token -->

                                <!-- Nama -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Doa</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" placeholder="Masukkan nama doa"
                                        value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Deskripsi -->
                                <div class="mb-3">
                                    <label for="desc" class="form-label">Deskripsi Doa</label>
                                    <textarea class="form-control @error('desc') is-invalid @enderror" id="desc" name="desc" rows="5"
                                        placeholder="Masukkan deskripsi doa" required>{{ old('desc') }}</textarea>
                                    @error('desc')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Ayat Renungan -->
                                <div class="mb-3">
                                    <label for="ayat_renungan" class="form-label">Ayat Renungan</label>
                                    <textarea class="form-control @error('ayat_renungan') is-invalid @enderror" id="ayat_renungan" name="ayat_renungan"
                                        rows="5" placeholder="Masukkan ayat renungan"></textarea>
                                    @error('ayat_renungan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Isi Renungan -->
                                <div class="mb-3">
                                    <label for="isi_renungan" class="form-label">Isi Renungan</label>
                                    <textarea class="form-control @error('isi_renungan') is-invalid @enderror" id="isi_renungan" name="isi_renungan"
                                        rows="5" placeholder="Masukkan isi renungan" required></textarea>
                                    @error('isi_renungan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Ayat Tambahan -->
                                <div class="mb-3">
                                    <label for="ayat_tambahan" class="form-label">Ayat Tambahan</label>
                                    <textarea class="form-control @error('ayat_tambahan') is-invalid @enderror" id="ayat_tambahan" name="ayat_tambahan"
                                        placeholder="Masukkan ayat tambahan" rows="5"></textarea>
                                    @error('ayat_tambahan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Gambar -->
                                <div class="mb-3">
                                    <label for="file" class="form-label">Gambar</label>
                                    <div>
                                        <img id="current-image" src="{{ asset('picture/Gereja.jpg') }}" alt="Gambar Doa"
                                            class="img-fluid rounded-3 mb-2">
                                    </div>
                                    <input type="file" class="form-control @error('file') is-invalid @enderror"
                                        id="file" name="file" onchange="previewImage(event)" required>
                                    @error('file')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tombol Submit -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <a href="/admin/doa" class="btn btn-danger mt-2">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/preview.js') }}"></script>
@endsection
