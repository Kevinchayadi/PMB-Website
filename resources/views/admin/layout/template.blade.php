<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @include('Layout.boostrap')
    @include('Layout.font')
</head>

<body>
    @include('admin.layout.header')
    <div class="row">
        <div class="col-3">
            @include('Layout.sidebar')
        </div>
        <div class="col-9">
            @yield('content')
        </div>
    </div>
    @include('admin.laoyut.footer')
</body>

</html>
