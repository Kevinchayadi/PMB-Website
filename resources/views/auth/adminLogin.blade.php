<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Login</title>
    <link rel="stylesheet" href="{{ asset('css/admin/login.css') }}">
    @include('Layout.boostrap')
    @include('Layout.font')
</head>

<body>
    <div class="container-fluid bg-image">
        <div class="row justify-content-center align-content-center py-5">
            <div class="col-md-6">
                <div class="card rounded-3 border-3">
                    <div class="card-header p-0 border-bottom-0 bg-white">
                        <img class="img-fluid rounded-top mx-auto d-block"
                            src="{{ asset('picture/Logo Paroki baru 2.png') }}" alt="">
                        <div class="fs-5 text-center fw-bolder">Login</div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/admin/login">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" required
                                    autofocus>
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                            </div>

                            <div class="form-group mb-3 form-check">
                                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                                <label class="form-check-label" for="remember">Remember Me</label>
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
