@extends('admin.layout.template')
@section('title', 'Artikel - Form')

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

                            <h2 class="card-title text-center mb-4 fw-bolder">Edit Artikel</h2>
                            <form action="/admin/edit-artikel/{id}" method="PUT">
                                @csrf <!-- Laravel CSRF Token -->

                                <!-- Nama -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Judul Artikel<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" placeholder="Masukkan judul artikel" required>
                                    @error('name')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Deskripsi -->
                                <div class="mb-3">
                                    <label for="desc" class="form-label">Deskripsi Artikel<span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control @error('desc') is-invalid @enderror" id="desc" name="desc"
                                        placeholder="Masukkan deskripsi Artikel" rows="20" required></textarea>
                                    @error('desc')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- gambar -->
                                <div class="mb-3">
                                    <label for="file" class="form-label">Gambar<span
                                            class="text-danger">*</span></label>

                                    <!-- Menampilkan gambar yang ada -->
                                    @if ($artikel->path)
                                        <img src="{{ asset('storage/' . $artikel->path) }}" alt="Gambar-Artikel"
                                            class="img-fluid rounded-3 mb-2" id="current-image">
                                    @else
                                        <img src="{{ asset('picture/Gereja.jpg') }}" alt="Gambar Default"
                                            class="img-fluid rounded-3 mb-2" id="current-image">
                                    @endif

                                    <!-- Input file untuk mengganti gambar -->
                                    <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                        id="foto" name="foto" placeholder="Masukkan gambar"
                                        onchange="previewImage(event)">
                                    @error('gambar')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- additional link --}}
                                <div class="mb-3">
                                    <label for="link" class="form-label">Link Artikel (Opsional)</label>
                                    <input type="text" class="form-control @error('link') is-invalid @enderror"
                                        id="link" name="link" placeholder="Masukkan link artikel">
                                    @error('link')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tombol Submit -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <a class=" btn btn-danger rounded-none mt-2" href="/admin/artikel"> cancel</a>
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
