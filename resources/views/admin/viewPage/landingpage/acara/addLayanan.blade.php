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
    <div class="container-fluid">
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
                                    <label for="nama_acara" class="form-label">Judul Layanan</label>
                                    <input type="text" class="form-control" id="nama_acara" name="nama_acara"
                                        placeholder="Masukkan judul layanan" required>
                                </div>

                                <!-- Type -->
                                <div class="mb-3">
                                    <label for="tipe_acara" class="form-label">Tipe Layanan (Liturgi/Sakramen)</label>
                                    <input type="text" class="form-control" id="tipe_acara" name="tipe_acara"
                                        placeholder="Masukkan tipe layanan" required></textarea>
                                </div>

                                <!-- Deskripsi -->
                                <div class="mb-3">
                                    <label for="deskripsi_acara" class="form-label">Deskripsi Layanan</label>
                                    <textarea class="form-control" id="deskripsi_acara" name="deskripsi_acara" placeholder="Masukkan deskripsi layanan" rows="20"
                                        required></textarea>
                                </div>

                                <!-- gambar -->
                                <div class="mb-3">
                                    <label for="foto" class="form-label">Gambar</label>
                                    
                                    <!-- Menampilkan gambar yang ada -->
                                
                                        <img src="{{ asset('picture/Gereja.jpg') }}" alt="Gambar Default" class="img-fluid rounded-3 mb-2" id="current-image">
                                    

                                    <!-- Input file untuk mengganti gambar -->
                                    <input type="file" class="form-control" id="foto" name="foto" placeholder="Edit gambar" onchange="previewImage(event)">
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
