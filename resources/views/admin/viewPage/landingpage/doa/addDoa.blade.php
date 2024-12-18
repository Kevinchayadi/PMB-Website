@extends('admin.layout.template')
@section('title', 'Doa - Form')

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

                            <h2 class="card-title text-center mb-4 fw-bolder">Create New Doa</h2>
                            <form action="/admin/add-doa" method="POST">
                                @csrf <!-- Laravel CSRF Token -->

                                <!-- Nama -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Doa<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Masukkan nama doa" required>
                                    @error('name')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Deskripsi -->
                                <div class="mb-3">
                                    <label for="desc" class="form-label">Deskripsi Doa<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="desc" name="desc"
                                        placeholder="Masukkan deskripsi doa" required>
                                    @error('desc')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Ayat Renungan --}}
                                <div class="mb-3">
                                    <label for="ayat_renungan" class="form-label">Ayat Renungan<span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control @error('ayat_renungan') is-invalid @enderror" id="ayat_renungan" name="ayat_renungan"
                                        placeholder="Masukkan ayat renungan" rows="5" required></textarea>
                                    @error('ayat_renungan')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Isi Renungan --}}
                                <div class="mb-3">
                                    <label for="isi_renungan" class="form-label">Isi Renungan<span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control @error('isi_renungan') is-invalid @enderror" id="isi_renungan" name="isi_renungan"
                                        placeholder="masukkan isi renungan" rows="5" required></textarea>
                                    @error('isi_renungan')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Ayat Tambahan --}}
                                <div class="mb-3">
                                    <label for="ayat_tambahan" class="form-label">Ayat Tambahan<span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control @error('ayat_tambahan') is-invalid @enderror" id="ayat_tambahan" name="ayat_tambahan"
                                        placeholder="Masukkan ayat tambahan" rows="5"></textarea>
                                    @error('ayat_tambahan')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- gambar -->
                                <div class="mb-3">
                                    <label for="file" class="form-label">Gambar<span
                                            class="text-danger">*</span></label>

                                    <!-- Menampilkan gambar yang ada -->
                                    <img src="{{ asset('picture/Gereja.jpg') }}" alt="Gambar Default"
                                        class="img-fluid rounded-3 mb-2" id="current-image">

                                    <!-- Input file untuk mengganti gambar -->
                                    <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                        id="foto" name="foto" placeholder="Masukkan gambar"
                                        onchange="previewImage(event)">
                                    @error('foto')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tombol Submit -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <a class=" btn btn-danger rounded-none mt-2" href="/admin/doa">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
