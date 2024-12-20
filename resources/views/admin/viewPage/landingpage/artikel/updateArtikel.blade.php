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
    <div class="container-fluid my-3">
        <div class=" min-vh-100 d-flex flex-column align-items-center justify-content-center ">
            <div class="row w-100 justify-content-center">
                <div class="col-10 col-md-8">
                    <div class="card bg-primary shadow-lg rounded-4">
                        <div class="card-body text-white">

                            <h2 class="card-title text-center mb-4 fw-bolder">Edit Artikel</h2>
                            <form action="/admin/edit-artikel/{{ $artikel->id }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')


                                <!-- Nama -->
                                <div class="mb-3">
                                    <label for="title" class="form-label">Judul Artikel<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        id="title" name="title" placeholder="Masukkan judul artikel"
                                        value="{{ $artikel->title }}" required>
                                    @error('title')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Deskripsi -->
                                <div class="mb-3">
                                    <label for="body" class="form-label">Deskripsi Artikel<span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body"
                                        placeholder="Masukkan deskripsi Artikel" rows="20" required>{{ $artikel->body }}</textarea>
                                    @error('body')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- additional link --}}
                                <div class="mb-3">
                                    <label for="additionalLink" class="form-label">Link Artikel (Opsional)</label>
                                    <input type="text" class="form-control @error('additionalLink') is-invalid @enderror"
                                        id="additionalLink" name="additionalLink" placeholder="Masukkan link artikel"
                                        value="{{ $artikel->additionalLink }}">
                                    @error('additionalLink')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- gambar -->
                                <div class="mb-3">
                                    <label for="file" class="form-label">Gambar<span
                                            class="text-danger">*</span></label>

                                    <!-- Menampilkan gambar yang ada -->
                                    <div>
                                        <img src="{{ asset('storage/' . $artikel->path) }}" alt="Gambar-Artikel"
                                            class="img-fluid rounded-3 mb-2" id="current-image">
                                    </div>

                                    <!-- Input file untuk mengganti gambar -->
                                    <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                        id="foto" name="foto" placeholder="Masukkan gambar"
                                        onchange="previewImage(event)">
                                    @error('gambar')
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
