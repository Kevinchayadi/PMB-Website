<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @include('user.Layout.bootstrap')
    @include('user.Layout.font')
    <link rel="stylesheet" href="{{ asset('css/hover.css') }}">
</head>

<body>
    @include('user.Layout.header')
    @yield('content')
    @include('user.Layout.footer')
</body>

</html>
