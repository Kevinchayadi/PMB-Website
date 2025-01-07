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

    <div class="container-fluid my-3">
        <div class="min-vh-100 d-flex flex-column align-items-center justify-content-center">
            <div class="row w-100 justify-content-center">
                <div class="col-10 col-md-8">
                    <div class="card bg-primary shadow-lg rounded-4">
                        <div class="card-body text-white">
                            <h2 class="card-title text-center mb-4 fw-bolder">Create New Pastor</h2>
                            <form action="/admin/add-pastor" method="POST" enctype="multipart/form-data">
                                @csrf <!-- Laravel CSRF Token -->

                                <!-- Nama -->
                                <div class="mb-3">
                                    <label for="nama_romo" class="form-label">Nama Pastor<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nama_romo') is-invalid @enderror"
                                        id="nama_romo" name="nama_romo" placeholder="Masukkan nama pastor"
                                        value="{{ old('nama_romo') }}" required>
                                    @error('nama_romo')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- dob -->
                                <div class="mb-3">
                                    <label for="DOB_romo" class="form-label">Tanggal Lahir Pastor<span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('DOB_romo') is-invalid @enderror"
                                        id="DOB_romo" name="DOB_romo" placeholder="Masukkan tanggal lahir pastor"
                                        value="{{ old('DOB_romo') }}" required>
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
                                        value="{{ old('tempat_lahir') }}" required>
                                    @error('tempat_lahir')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Jabatan -->
                                <div class="mb-3">
                                    <label for="jabatan" class="form-label">Jabatan Pastor<span
                                            class="text-danger">*</span></label>
                                    <select class="form-select @error('jabatan') is-invalid @enderror" name="jabatan"
                                        id="jabatan">
                                        <option value="" disabled {{ old('jabatan') ? '' : 'selected' }}>Pilih Jabatan
                                        </option>
                                        <option value="Pastor Paroki"
                                            {{ old('jabatan') == 'Pastor Paroki' ? 'selected' : '' }}>Pastor Paroki</option>
                                        <option value="Romo Tamu" {{ old('jabatan') == 'Romo Tamu' ? 'selected' : '' }}>Romo
                                            Tamu</option>
                                        <option value="Pastor Pembantu Paroki"
                                            {{ old('jabatan') == 'Pastor Pembantu Paroki' ? 'selected' : '' }}>Pastor
                                            Pembantu Paroki</option>
                                    </select>
                                    @error('jabatan')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Pengalaman -->
                                <div class="mb-3">
                                    <label for="pengalaman" class="form-label">Pengalaman Pastor<span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control @error('pengalaman') is-invalid @enderror" name="pengalaman" id="pengalaman"
                                        cols="30" rows="10">{{ old('pengalaman') }}</textarea>
                                    @error('pengalaman')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Nomor Telepon -->
                                <div class="mb-3">
                                    <label for="nomorhp_romo" class="form-label">Nomor Telepon Pastor</label>
                                    <input type="number" class="form-control @error('nomorhp_romo') is-invalid @enderror"
                                        id="nomorhp_romo" name="nomorhp_romo" placeholder="Masukkan nomor telepon pastor"
                                        value="{{ old('nomorhp_romo') }}" required>
                                    @error('nomorhp_romo')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Gambar -->
                                <div class="mb-3">
                                    <label for="file" class="form-label">Foto Pastor<span
                                            class="text-danger">*</span></label>
                                    <img src="{{ asset('picture/Gereja.jpg') }}" alt="Gambar Default"
                                        class="img-fluid rounded-3 mb-2" id="current-image">
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
                                    <a class="btn btn-danger rounded-none mt-2" href="/admin/pastor">Cancel</a>
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
