@extends('admin.layout.template')
@section('title', 'Layanan - Edit Form')

@section('content')
    <div class="container-fluid">
        <div class="min-vh-100 d-flex flex-column align-items-center justify-content-center">
            <div class="row w-100 justify-content-center">
                <div class="col-10 col-md-8">
                    <div class="card bg-primary shadow-lg rounded-4">
                        <div class="card-body text-white">

                            <h2 class="card-title text-center mb-4 fw-bolder">Edit Layanan</h2>

                            <!-- Form Edit Layanan -->
                            <form action="{{ route('admin.updateAcara', $acara->slug) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Nama Layanan -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Layanan</label>
                                    <input type="text" class="form-control" id="name" name="nama_acara" 
                                        value="{{ old('nama_acara', $acara->nama_acara) }}" required>
                                </div>

                                <!-- Tipe Layanan -->
                                <div class="mb-3">
                                    <label for="type" class="form-label">Tipe Layanan (Liturgi/Sakramen)</label>
                                    <input type="text" class="form-control" id="type" name="tipe_acara" 
                                        value="{{ old('tipe_acara', $acara->tipe_acara) }}" required>
                                </div>

                                <!-- Deskripsi Layanan -->
                                <div class="mb-3">
                                    <label for="desc" class="form-label">Deskripsi Layanan</label>
                                    <textarea class="form-control" id="desc" name="deskripsi_acara" rows="5" required>{{ old('deskripsi_acara', $acara->deskripsi_acara) }}</textarea>
                                </div>

                                <!-- Gambar -->
                                <div class="mb-3">
                                    <label for="foto" class="form-label">Gambar</label>
                                    
                                    <!-- Menampilkan gambar yang ada -->
                                    @if ($acara->path)
                                        <img src="{{ asset('storage/' . $acara->path) }}" alt="Gambar Layanan" class="img-fluid rounded-3 mb-2" id="current-image">
                                    @else
                                        <img src="{{ asset('picture/Gereja.jpg') }}" alt="Gambar Default" class="img-fluid rounded-3 mb-2" id="current-image">
                                    @endif

                                    <!-- Input file untuk mengganti gambar -->
                                    <input type="file" class="form-control" id="foto" name="foto" placeholder="Edit gambar" onchange="previewImage(event)">
                                </div>

                                <!-- Tombol Submit -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a href="{{ route('admin.acara') }}" class="btn btn-danger rounded-none mt-2">Cancel</a>
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
