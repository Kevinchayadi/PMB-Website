<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Umat - Register</title>
    <link rel="stylesheet" href="{{ asset('css/admin/login.css') }}">
    @include('user.Layout.bootstrap')
    @include('user.Layout.font')
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-75">
        <div class="bg-primary p-2 rounded-3">
            <div class="row justify-content-center bg-white shadow-lg rounded-3 w-lg-75 w-100 p-4 overflow-auto mx-auto"
                style="max-height: 90vh;">
                <div class="title fs-4 fw-bolder text-center mb-4">Ayo Buat Akun</div>

                <!-- Bagian Kiri -->
                <div class="col-lg-6 col-12 mb-4">
                    <div class="card border-0">
                        <div class="image card-img-top bg-primary p-2 rounded-3">
                            <img class="img-fluid h-100 rounded-3 shadow-lg" src="{{ asset('picture/Gereja.jpg') }}"
                                alt="">
                        </div>
                        <div class="card-body px-0">
                            <p class="card-text text-justify">Gereja Santo Petrus dan Paulus Paroki Mangga Besar
                                terletak di
                                Jakarta,
                                Indonesia, dan merupakan salah satu gereja tertua di daerah tersebut. Didirikan pada
                                masa
                                kolonial Belanda, gereja ini awalnya melayani komunitas Katolik kecil yang terdiri dari
                                penduduk lokal dan orang-orang Eropa yang tinggal di wilayah Batavia. Seiring
                                berjalannya
                                waktu, gereja ini mengalami perkembangan yang signifikan, beradaptasi dengan perubahan
                                sosial dan budaya yang terjadi di sekitarnya. Arsitektur gereja ini mencerminkan
                                perpaduan
                                gaya Eropa klasik dengan elemen lokal, dan menjadi saksi bisu perjalanan sejarah serta
                                pertumbuhan komunitas Katolik di daerah Mangga Besar. Gereja ini terus berfungsi sebagai
                                pusat spiritual dan sosial, menyelenggarakan berbagai kegiatan keagamaan dan komunitas
                                yang
                                memperkuat ikatan antar umat.
                            </p>
                            <a href="/home" class="btn btn-primary">Ayo lihat lihat</a>
                        </div>
                    </div>
                </div>

                <!-- Bagian Kanan -->
                <div class="col-lg-6 col-12">
                    <div class="card border-0 overflow-auto" style="max-height: 60vh;">
                        <div class="card-body">
                            <!-- Pesan kesalahan validasi -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <!-- Form -->
                            <form action="/register" method="POST">
                                @csrf <!-- Token CSRF untuk keamanan form -->

                                <!-- Nama Umat -->
                                <div class="mb-3">
                                    <label for="nama_umat" class="form-label">Nama Umat<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nama_umat') is-invalid @enderror"
                                        id="nama_umat" name="nama_umat"
                                        placeholder="Masukkan nama umat. Contoh: John Doe" required>
                                    @error('nama_umat')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="email_umat" class="form-label">Alamat Email<span
                                            class="text-danger">*</span></label>
                                    <input type="email_umat"
                                        class="form-control  @error('email_umat') is-invalid @enderror" id="email_umat"
                                        name="email_umat" placeholder="Masukkan alamat email. Contoh: nama@example.com"
                                        required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                                    <div class="form-text">Pastikan email mengandung @ dan domain yang valid (seperti
                                        .com).
                                    </div>
                                    @error('email_umat')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">Kata Sandi<span
                                            class="text-danger">*</span></label>
                                    <input type="password" class="form-control  @error('password') is-invalid @enderror"
                                        id="password" name="password" placeholder="Masukkan kata sandi" required>
                                    @error('password')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Konfirmasi Password -->
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi<span
                                            class="text-danger">*</span></label>
                                    <input type="password"
                                        class="form-control  @error('password_confirmation') is-invalid @enderror"
                                        id="password_confirmation" name="password_confirmation"
                                        placeholder="Ulangi kata sandi" required>
                                    @error('password_confirmation')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- TTL Umat --}}
                                <div class="mb-3">
                                    <label for="ttl_umat" class="form-label">Tanggal Lahir<span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control  @error('ttl_umat') is-invalid @enderror"
                                        id="ttl_umat" name="ttl_umat" placeholder="Masukkan tanggal lahir" required>
                                    @error('ttl_umat')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Wilayah -->
                                <div class="mb-3">
                                    <label for="wilayah" class="form-label">Wilayah<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control  @error('wilayah') is-invalid @enderror"
                                        id="wilayah" name="wilayah"
                                        placeholder="Masukkan wilayah. Contoh: Wilayah St. Joseph atau Wilayah 7"
                                        required>
                                    @error('wilayah')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Lingkungan -->
                                <div class="mb-3">
                                    <label for="lingkungan" class="form-label">Lingkungan<span
                                            class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control  @error('lingkungan') is-invalid @enderror" id="lingkungan"
                                        name="lingkungan" placeholder="Masukkan lingkungan. Contoh: Lingkungan 7"
                                        required>
                                    @error('lingkungan')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Nomor HP -->
                                <div class="mb-3">
                                    <label for="nomorhp_umat" class="form-label">Nomor HP<span
                                            class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control  @error('nomorhp_umat') is-invalid @enderror"
                                        id="nomorhp_umat" name="nomorhp_umat" placeholder="Masukkan nomor HP"
                                        required pattern="\d+">
                                    <div class="form-text">Hanya angka yang diperbolehkan.</div>
                                    @error('nomorhp_umat')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Alamat -->
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat<span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control  @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3"
                                        placeholder="Masukkan alamat" required></textarea>
                                    @error('alamat')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Status -->
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status<span
                                            class="text-danger">*</span></label>
                                    <select class="form-select  @error('status') is-invalid @enderror" id="status"
                                        name="status" required>
                                        <option value="" selected disabled>Pilih status...</option>
                                        <option value="menikah">Menikah</option>
                                        <option value="belum_menikah">Belum Menikah</option>
                                        <option value="lainnya">Lainnya</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Pekerjaan -->
                                <div class="mb-3">
                                    <label for="pekerjaan" class="form-label">Pekerjaan<span
                                            class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control  @error('pekerjaan') is-invalid @enderror" id="pekerjaan"
                                        name="pekerjaan" placeholder="Masukkan pekerjaan. Contoh: Wiraswasta"
                                        required>
                                    @error('pekerjaan')
                                        <div class="invalid-feedback text-white">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Tombol Submit -->
                                <button type="submit" class="btn btn-primary">Daftar</button>
                                <div class="register fs-6 fw-bolder d-flex">
                                    Punya akun? <span class="text-primary"><a href="/login" class="nav-link">Masuk
                                            di sini</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
