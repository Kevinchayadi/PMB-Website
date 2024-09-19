@extends('Layout.template')
@section('title', 'Umat - Register')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Form Registrasi Umat</h2>

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

        <form action="{{ route('umat.register.submit') }}" method="POST">
            @csrf <!-- Token CSRF untuk keamanan form -->

            <!-- Nama Umat -->
            <div class="mb-3">
                <label for="nama_umat" class="form-label">Nama Umat</label>
                <input type="text" class="form-control" id="nama_umat" name="nama_umat" placeholder="Masukkan nama umat" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                <div class="form-text">Pastikan email mengandung @ dan domain yang valid (seperti .com).</div>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
            </div>

            <!-- Konfirmasi Password -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password" required>
            </div>

            <!-- Wilayah -->
            <div class="mb-3">
                <label for="wilayah" class="form-label">Wilayah</label>
                <input type="text" class="form-control" id="wilayah" name="wilayah" placeholder="Masukkan wilayah" required>
            </div>

            <!-- Lingkungan -->
            <div class="mb-3">
                <label for="lingkungan" class="form-label">Lingkungan</label>
                <input type="text" class="form-control" id="lingkungan" name="lingkungan" placeholder="Masukkan lingkungan" required>
            </div>

            <!-- Nomor HP -->
            <div class="mb-3">
                <label for="nomohp_umat" class="form-label">Nomor HP</label>
                <input type="text" class="form-control" id="nomohp_umat" name="nomohp_umat" placeholder="Masukkan nomor HP" required pattern="\d+">
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
                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Masukkan pekerjaan" required>
            </div>

            <!-- Tombol Submit -->
            <button type="submit" class="btn btn-primary">Daftar</button>
        </form>
    </div>
   
@endsection
