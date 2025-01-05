<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @include('admin.layout.bootstrap')
    @include('admin.layout.font')
    <link rel="stylesheet" href="{{ asset('css/hover.css') }}">

</head>

<body>
    <div class="container-fluid p-0 m-0">
        <div class="row p-0 m-0 " style="max-width: 100%; max-height=100vh;">
            <div class=" col-3 col-md-3 col-lg-2  p-0">
                @include('admin.layout.sidebar')
            </div>
            <div class="main col-9 col-md-9 col-lg-10 p-0 m-0 ">
                @yield('content')
            </div>
        </div>

    </div>
</body>

</html>
