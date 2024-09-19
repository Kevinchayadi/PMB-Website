@extends('Layout.template')
@section('title', 'Admin - Login')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-header">Login</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('/admin/login') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" required autofocus>
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
   
@endsection