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
    @yield('content')
    @include('user.Layout.footer')
</body>

</html>
