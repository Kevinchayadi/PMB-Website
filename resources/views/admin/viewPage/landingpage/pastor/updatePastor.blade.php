@extends('admin.layout.template')
@section('title', 'Pastor - Form')

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
        <div class=" min-vh-100 d-flex flex-column align-items-center justify-content-center my-5">
            <div class="row w-100 justify-content-center">
                <div class="col-10 col-md-8">
                    <div class="card bg-primary shadow-lg rounded-4">
                        <div class="card-body text-white">

                            <h2 class="card-title text-center mb-4 fw-bolder">Edit Pastor</h2>
                            <form action="/admin/add-pastor" method="POST">
                                @csrf <!-- Laravel CSRF Token -->

                                <!-- Nama -->
                                <div class="mb-3">
                                    <label for="nama_romo" class="form-label">Nama Pastor<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nama_romo') is-invalid @enderror"
                                        id="nama_romo" name="nama_romo" placeholder="Masukkan nama pastor" required>
                                    @error('nama_romo')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- dob -->
                                <div class="mb-3">
                                    <label for="DOB_romo" class="form-label">Tanggal Lahir Pastor<span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('DOB_romo') is-invalid @enderror"
                                        id="DOB_romo" name="DOB_romo" placeholder="Masukkan tanggal lahir pastor" required>
                                    @error('DOB_romo')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- pob -->
                                <div class="mb-3">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir Pastor<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                        id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan tempat lahir pastor"
                                        required>
                                    @error('tempat_lahir')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="jabatan" class="form-label">Jabatan<span
                                            class="text-danger">*</span></label>
                                    <select class="form-control @error('jabatan') is-invalid @enderror" name="jabatan"
                                        id="jabatan">
                                        <option value="" selected disabled>Pilih Jabatan</option>
                                        <option value="Pastor Paroki">Pastor Paroki</option>
                                        <option value="Romo Tamu">Romo Tamu</option>
                                        <option value="Pastor Pembantu Paroki">Pastor Pembantu Paroki</option>
                                    </select>
                                    @error('jabatan')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="Pengalaman" class="form-label">Pengalaman<span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control @error('Pengalaman') is-invalid @enderror" name="Pengalaman" id="Pengalaman"
                                        cols="30" rows="10"></textarea>
                                    @error('Pengalaman')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- nomor -->
                                <div class="mb-3">
                                    <label for="nomor" class="form-label">Nomor Telepon Pastor<span
                                            class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('nomor') is-invalid @enderror"
                                        id="nomor" name="nomor" placeholder="Masukkan nomor telepon pastor" required>
                                    @error('nomor')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- gambar -->
                                <div class="mb-3">
                                    <label for="foto" class="form-label">Gambar<span
                                            class="text-danger">*</span></label>

                                    <!-- Menampilkan gambar yang ada -->
                                    @if ($romo->path)
                                        <img src="{{ asset('storage/' . $romo->path) }}" alt="Gambar_Kegiatan"
                                            class="img-fluid rounded-3 mb-2" id="current-image">
                                    @else
                                        <img src="{{ asset('picture/Gereja.jpg') }}" alt="Gambar Default"
                                            class="img-fluid rounded-3 mb-2" id="current-image">
                                    @endif

                                    <!-- Input file untuk mengganti gambar -->
                                    <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                        id="foto" name="foto" placeholder="Edit gambar"
                                        onchange="previewImage(event)" required>
                                    @error('foto')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tombol Submit -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a class=" btn btn-danger rounded-none mt-2" href="/admin/pastor"> cancel</a>
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
