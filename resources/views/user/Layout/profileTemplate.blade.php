<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @include('user.Layout.boostrap')
    @include('user.Layout.font')
</head>

<body>
    @include('user.Layout.header')
    <div class="container-fluid mt-0 row mx-auto">
        <div class="col-2 border-end d-lg-block d-none">
            @include('user.Layout.leftpage')
        </div>
        <div class="col-lg-8 col-12">
            @include('user.Layout.card')
            @yield('content')
        </div>
        <div class="col-2 border-start d-lg-block d-none">
            @include('user.Layout.rightpage')
        </div>
    </div>
    @include('user.Layout.footer')
    <script src="{{ asset('js/scroll.js') }}"></script>
</body>

</html>
