@extends('admin.layout.template')
@section('title', 'Layanan - Form')

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

                            <h2 class="card-title text-center mb-4 fw-bolder">Create New Layanan</h2>
                            <form action="/admin/add-layanan" method="POST" enctype="multipart/form-data">
                                @csrf <!-- Laravel CSRF Token -->

                                <!-- Nama -->
                                <div class="mb-3">
                                    <label for="nama_acara" class="form-label">Judul Layanan<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nama_acara') is-invalid @enderror"
                                        id="nama_acara" name="nama_acara" placeholder="Masukkan judul layanan" required>
                                    @error('nama_acara')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Type -->
                                <div class="mb-3">
                                    <label for="tipe_acara" class="form-label">Tipe Layanan (Liturgi/Sakramen)<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('tipe_acara') is-invalid @enderror"
                                        id="tipe_acara" name="tipe_acara" placeholder="Masukkan tipe layanan" required>
                                    @error('tipe_acara')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Deskripsi -->
                                <div class="mb-3">
                                    <label for="deskripsi_acara" class="form-label">Deskripsi Layanan<span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control @error('deskripsi_acara') is-invalid @enderror" id="deskripsi_acara"
                                        name="deskripsi_acara" placeholder="Masukkan deskripsi layanan" rows="20" required></textarea>
                                    @error('deskripsi_acara')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- gambar -->
                                <div class="mb-3">
                                    <label for="foto" class="form-label">Gambar<span
                                            class="text-danger">*</span></label>

                                    <!-- Menampilkan gambar yang ada -->
                                    <img src="{{ asset('picture/Gereja.jpg') }}" alt="Gambar Default"
                                        class="img-fluid rounded-3 mb-2" id="current-image">

                                    <!-- Input file untuk mengganti gambar -->
                                    <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                        id="foto" name="foto" placeholder="Masukkan gambar"
                                        onchange="previewImage(event)" required>
                                    @error('foto')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tombol Submit -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <a class=" btn btn-danger rounded-none mt-2" href="/admin/layanan"> cancel</a>
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
