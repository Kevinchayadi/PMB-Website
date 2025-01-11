@extends('admin.layout.template')
@section('title', 'Form Pembaruan Data Admin')

@section('content')
    <div class="container mt-4">
        <!-- Alert jika ada error -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Terjadi Kesalahan!</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Form Update Admin -->
        <div class="row d-flex justify-content-center align-items-center min-vh-100">
            <div class="col-md-8">
                <div class="card shadow-lg bg-primary text-white">
                    <div class="card-body">
                        <h2 class="text-center fw-bold mb-4">Perbarui Data Admin</h2>
                        <form action="{{ secure_url('/admin/admin-detail/' . $admin->username) }}" method="POST">
                            @csrf
                            @method('PUT') <!-- Method PUT untuk update data -->

                            <!-- Username -->
                            <div class="mb-3">
                                <label for="username" class="form-label text-white">Nama Pengguna</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    id="username" name="username" value="{{ old('username', $admin->username) }}" required>
                                @error('username')
                                    <div class="invalid-feedback text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label text-white">Kata Sandi (Kosongkan jika tidak ingin
                                    diubah)</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    id="password" name="password">
                                @error('password')
                                    <div class="invalid-feedback text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label text-white">Konfirmasi Kata
                                    Sandi</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    name="password_confirmation">
                            </div>

                            <!-- Role -->
                            <div class="mb-3">
                                <label for="id_role" class="form-label text-white">Peran</label>
                                <select class="form-control @error('id_role') is-invalid @enderror" id="role"
                                    name="role" required>
                                    <option value="" disabled>Pilih Peran</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id_role }}"
                                            {{ old('id_role', $admin->id_role) == $role->id_role ? 'selected' : '' }}>
                                            {{ $role->role }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_role')
                                    <div class="invalid-feedback text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tombol Submit -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success">Perbarui Data</button>
                                <a href="{{ url('/admin/admin-list') }}" class="btn btn-danger mt-2">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
