<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Login</title>
    <link rel="stylesheet" href="{{ asset('css/admin/login.css') }}">
    @include('admin.layout.bootstrap')
    @include('admin.layout.font')
</head>

<body>
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
    <div class="w-75 mx-auto">
        <div class="container-fluid row justify-content-center align-content-center bg-white shadow-lg rounded-3">
            <div class="title fs-4 fw-bolder text-center">Ayo Masuk ke PMB Admin</div>
            <div class="col-6">
                <div class="image h-100 p-4">
                    <img class="img-fluid h-100 rounded-3 shadow-lg" src="{{ asset('picture/Gereja.jpg') }}"
                        alt="">
                </div>
            </div>
            <div class="col-6">
                <div class="card border-0 p-4">
                    <div class="card-body">
                        <form method="POST" action="/admin/login">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="text">Nama Pengguna</label>
                                <input type="username" name="username"
                                    class="form-control @error('username') is-invalid @enderror" id="username" required
                                    autofocus>
                                @error('username')
                                    <div class="invalid-feedback text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Kata Sandi</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" id="password"
                                    required>
                                @error('password')
                                    <div class="invalid-feedback text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3 form-check">
                                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                                <label class="form-check-label" for="remember">Ingat Saya</label>
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Masuk</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
