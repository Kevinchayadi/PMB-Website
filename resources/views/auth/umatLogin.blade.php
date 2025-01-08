<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Umat - Login</title>
    <link rel="stylesheet" href="{{ asset('css/admin/login.css') }}">
    @include('user.Layout.bootstrap')
    @include('user.Layout.font')
</head>

<body>
    <div class="w-75 mx-auto">
        <div class="container-fluid row justify-content-center align-content-center shadow-lg bg-white rounded-3">
            <div class="title fs-4 fw-bolder text-center text-primary">Ayo Masuk ke Website PMB</div>
            <div class="col-lg-6 col-12">
                <div class="image h-100 p-3 rounded-3 bg-primary">
                    <img class="img-fluid h-100 rounded-3 shadow-lg w-100" src="{{ asset('picture/Gereja.jpg') }}"
                        alt="">
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="card border-0">
                    <div class="card-header p-4 border-bottom-0 bg-white">
                        <a href="/auth/redirect" class="nav-link d-flex justify-content-center">
                            <div class="fs-5 fw-bolder me-2 align-self-center">Masuk dengan</div>
                            <div class="google badge text-bg-primary rounded-circle p-2 align-self-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#fff"
                                    class="bi bi-google" viewBox="0 0 16 16">
                                    <path
                                        d="M15.545 6.558a9.4 9.4 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.7 7.7 0 0 1 5.352 2.082l-2.284 2.284A4.35 4.35 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.8 4.8 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.7 3.7 0 0 0 1.599-2.431H8v-3.08z" />
                                </svg>
                            </div>
                        </a>
                    </div>
                    <div class="divider d-flex align-items-center my-4">
                        <p class="text-center fw-bold mx-3 mb-0">Or</p>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="/login">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="email_umat">Alamat Email</label>
                                <input type="email_umat" name="email_umat"
                                    class="form-control @error('email_umat') is-invalid @enderror" id="email_umat"
                                    required autofocus>
                                @error('email_umat')
                                    <div class="invalid-feedback text-white">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Kata Sandi</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" id="password"
                                    required>
                                @error('password')
                                    <div class="invalid-feedback text-white">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3 form-check">
                                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                                <label class="form-check-label" for="remember">Ingat Saya</label>
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Masuk</button>
                            </div>
                            <div class="register fs-6 fw-bolder d-flex">
                                Tidak punya akun? <span class="text-primary"><a href="/register" class="nav-link">Daftar
                                        di sini</a></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
