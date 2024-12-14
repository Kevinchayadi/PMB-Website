<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Umat - Register</title>
    <link rel="stylesheet" href="{{ asset('css/admin/login.css') }}">
    @include('user.layout.bootstrap')
    @include('user.layout.font')
</head>

<body>
    <div class="container-fluid row justify-content-center">
        <div class="col-lg-6 col-12">
            <div class="title fs-5 fw-bolder text-center">Let's Make An Account</div>
            <div class="card border-0 p-4">
                <div class="image card-img-top">
                    <img class="img-fluid h-100 rounded-3 shadow-lg" src="{{ asset('picture/Gereja.jpg') }}"
                        alt="">
                </div>
                <div class="card-body px-0">
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, placeat
                        assumenda mollitia molestias illo facere dolorum et amet. Magni omnis enim iste ut cum? Maxime
                        tenetur pariatur harum ad quia.
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi iste qui repudiandae quia nihil
                        consequuntur sunt odit aperiam iusto. Fugiat reiciendis debitis sit provident quis, suscipit id
                        doloribus sint consequatur.
                    </p>
                    <a href="/home" class="btn btn-primary">See Around</a>
                </div>
            </div>
        </div>

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

        <div class="col-lg-6 col-12">
            <a href="#" class="nav-link d-flex justify-content-center">
                <div class="fs-5 fw-bolder me-2 align-self-center">Sign In With</div>
                <div class="google badge text-bg-primary rounded-circle p-2 align-self-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff"
                        class="bi bi-google" viewBox="0 0 16 16">
                        <path
                            d="M15.545 6.558a9.4 9.4 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.7 7.7 0 0 1 5.352 2.082l-2.284 2.284A4.35 4.35 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.8 4.8 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.7 3.7 0 0 0 1.599-2.431H8v-3.08z" />
                    </svg>
                </div>
            </a>
            <div class="divider d-flex align-items-center my-4">
                <p class="text-center fw-bold mx-3 mb-0">Or</p>
            </div>
            <div class="card border-0 h-50 overflow-y-scroll">
                <div class="card-body">
                    <form action="/register" method="POST">
                        @csrf <!-- Token CSRF untuk keamanan form -->

                        <!-- Nama Umat -->
                        <div class="mb-3">
                            <label for="nama_umat" class="form-label">Nama Umat</label>
                            <input type="text" class="form-control" id="nama_umat" name="nama_umat"
                                placeholder="Masukkan nama umat" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="name@example.com" required
                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                            <div class="form-text">Pastikan email mengandung @ dan domain yang valid (seperti .com).
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Masukkan password" required>
                        </div>

                        <!-- Konfirmasi Password -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" placeholder="Ulangi password" required>
                        </div>

                        <!-- Wilayah -->
                        <div class="mb-3">
                            <label for="wilayah" class="form-label">Wilayah</label>
                            <input type="text" class="form-control" id="wilayah" name="wilayah"
                                placeholder="Masukkan wilayah" required>
                        </div>

                        <!-- Lingkungan -->
                        <div class="mb-3">
                            <label for="lingkungan" class="form-label">Lingkungan</label>
                            <input type="text" class="form-control" id="lingkungan" name="lingkungan"
                                placeholder="Masukkan lingkungan" required>
                        </div>

                        <!-- Nomor HP -->
                        <div class="mb-3">
                            <label for="nomohp_umat" class="form-label">Nomor HP</label>
                            <input type="text" class="form-control" id="nomohp_umat" name="nomohp_umat"
                                placeholder="Masukkan nomor HP" required pattern="\d+">
                            <div class="form-text">Hanya angka yang diperbolehkan.</div>
                        </div>

                        <!-- Alamat -->
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat" required></textarea>
                        </div>

                        <!-- Status -->
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="" selected disabled>Pilih status...</option>
                                <option value="menikah">Menikah</option>
                                <option value="belum_menikah">Belum Menikah</option>
                                <option value="lainnya">Lainnya</option>
                            </select>
                        </div>

                        <!-- Pekerjaan -->
                        <div class="mb-3">
                            <label for="pekerjaan" class="form-label">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"
                                placeholder="Masukkan pekerjaan" required>
                        </div>

                        <!-- Tombol Submit -->
                        <button type="submit" class="btn btn-primary">Daftar</button>
                        <div class="register fs-6 fw-bolder d-flex">
                            Have an account? <span class="text-primary"><a href="/login"
                                    class="nav-link">Login</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
