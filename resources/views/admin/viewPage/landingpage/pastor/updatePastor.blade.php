@extends('admin.layout.template')
@section('title', 'Pastor - Form Update')

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
        <div class="min-vh-100 d-flex flex-column align-items-center justify-content-center my-5">
            <div class="row w-100 justify-content-center">
                <div class="col-10 col-md-8">
                    <div class="card bg-primary shadow-lg rounded-4">
                        <div class="card-body text-white">

                            <h2 class="card-title text-center mb-4 fw-bolder">Edit Pastor</h2>
                            <form action="{{ route('admin.updatePastor', $pastor->id_romo) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT') <!-- Method spoofing for PUT request -->

                                <!-- Nama -->
                                <div class="mb-3">
                                    <label for="nama_romo" class="form-label">Nama Pastor<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nama_romo') is-invalid @enderror"
<<<<<<< HEAD
                                        id="nama_romo" name="nama_romo" value="{{ old('nama_romo', $pastor->nama_romo) }}"
                                        required>
=======
                                        id="nama_romo" name="nama_romo" placeholder="Masukkan nama pastor"
                                        value="{{ old('nama_romo', $pastor->nama_romo) }}" required>
>>>>>>> 07907ae12082f64d2cf56987107948381f286f31
                                    @error('nama_romo')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- dob -->
                                <div class="mb-3">
                                    <label for="DOB_romo" class="form-label">Tanggal Lahir Pastor<span class="text-danger">*</span></label>
                                    <input type="date" class="form-control @error('DOB_romo') is-invalid @enderror"
<<<<<<< HEAD
                                        id="DOB_romo" name="DOB_romo" value="{{ old('DOB_romo', $pastor->DOB_romo) }}"
                                        required>
=======
                                        id="DOB_romo" name="DOB_romo" placeholder="Masukkan tanggal lahir pastor"
                                        value="{{ old('DOB_romo', $pastor->DOB_romo) }}" required>
>>>>>>> 07907ae12082f64d2cf56987107948381f286f31
                                    @error('DOB_romo')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- pob -->
                                <div class="mb-3">
                                    <label for="tempat_lahir" class="form-label">Tempat Lahir Pastor<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
<<<<<<< HEAD
                                        id="tempat_lahir" name="tempat_lahir"
=======
                                        id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan tempat lahir pastor"
>>>>>>> 07907ae12082f64d2cf56987107948381f286f31
                                        value="{{ old('tempat_lahir', $pastor->tempat_lahir) }}" required>
                                    @error('tempat_lahir')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Jabatan -->
                                <div class="mb-3">
                                    <label for="jabatan" class="form-label">Jabatan<span class="text-danger">*</span></label>
                                    <select class="form-control @error('jabatan') is-invalid @enderror" name="jabatan"
                                        id="jabatan">
<<<<<<< HEAD
                                        <option value="" disabled
                                            {{ old('jabatan', $pastor->jabatan ?? '') == '' ? 'selected' : '' }}>
                                            Pilih Jabatan</option>
                                        <option value="Pastor Paroki"
                                            {{ old('jabatan', $pastor->jabatan ?? '') == 'Pastor Paroki' ? 'selected' : '' }}>
                                            Pastor Paroki</option>
                                        <option value="Romo Tamu"
                                            {{ old('jabatan', $pastor->jabatan ?? '') == 'Romo Tamu' ? 'selected' : '' }}>
                                            Romo Tamu</option>
                                        <option value="Pastor Pembantu Paroki"
                                            {{ old('jabatan', $pastor->jabatan ?? '') == 'Pastor Pembantu Paroki' ? 'selected' : '' }}>
                                            Pastor Pembantu Paroki</option>
=======
                                        <option value="" disabled {{ old('jabatan', $pastor->jabatan) ? '' : 'selected' }}>Pilih Jabatan</option>
                                        <option value="Pastor Paroki" {{ old('jabatan', $pastor->jabatan) == 'Pastor Paroki' ? 'selected' : '' }}>Pastor Paroki</option>
                                        <option value="Romo Tamu" {{ old('jabatan', $pastor->jabatan) == 'Romo Tamu' ? 'selected' : '' }}>Romo Tamu</option>
                                        <option value="Pastor Pembantu Paroki" {{ old('jabatan', $pastor->jabatan) == 'Pastor Pembantu Paroki' ? 'selected' : '' }}>Pastor Pembantu Paroki</option>
>>>>>>> 07907ae12082f64d2cf56987107948381f286f31
                                    </select>
                                    @error('jabatan')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- pengalaman -->
                                <div class="mb-3">
<<<<<<< HEAD
                                    <label for="Pengalaman" class="form-label">Pengalaman<span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control @error('Pengalaman') is-invalid @enderror" name="Pengalaman" id="Pengalaman"
                                        cols="30" rows="10">{{ old('Pengalaman', $pastor->Pengalaman) }}</textarea>
                                    @error('Pengalaman')
=======
                                    <label for="pengalaman" class="form-label">pengalaman<span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('pengalaman') is-invalid @enderror" name="pengalaman" id="pengalaman"
                                        cols="30" rows="10">{{ old('pengalaman', $pastor->pengalaman) }}</textarea>
                                    @error('pengalaman')
>>>>>>> 07907ae12082f64d2cf56987107948381f286f31
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Nomor Telepon -->
                                <div class="mb-3">
<<<<<<< HEAD
                                    <label for="nomor" class="form-label">Nomor Telepon Pastor<span
                                            class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('nomor') is-invalid @enderror"
                                        id="nomor" name="nomor"
                                        value="{{ old('nomorhp_romo', $pastor->nomorhp_romo) }}" required>
                                    @error('nomor')
=======
                                    <label for="nomorhp_romo" class="form-label">Nomor Telepon Pastor<span class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('nomorhp_romo') is-invalid @enderror"
                                        id="nomorhp_romo" name="nomorhp_romo" placeholder="Masukkan nomor telepon pastor"
                                        value="{{ old('nomorhp_romo', $pastor->nomorhp_romo) }}" required>
                                    @error('nomorhp_romo')
>>>>>>> 07907ae12082f64d2cf56987107948381f286f31
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Gambar -->
                                <div class="mb-3">
<<<<<<< HEAD
                                    <label for="foto" class="form-label">Gambar<span
                                            class="text-danger">*</span></label>

                                    <!-- Menampilkan gambar yang ada -->
                                    <div>
                                        <img src="{{ asset('storage/' . $pastor->path) }}" alt="Gambar_Pastor"
=======
                                    <label for="foto" class="form-label">Gambar<span class="text-danger">*</span></label>
                                    @if ($pastor->path)
                                        <img src="{{ asset('storage/' . $pastor->path) }}" alt="Foto Pastor"
>>>>>>> 07907ae12082f64d2cf56987107948381f286f31
                                            class="img-fluid rounded-3 mb-2" id="current-image">
                                    </div>

                                    <!-- Input file untuk mengganti gambar -->
                                    <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                        id="foto" name="foto" placeholder="Edit gambar"
                                        onchange="previewImage(event)">
                                    @error('foto')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tombol Submit -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-success">Update</button>
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
