<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.laravel ={ scrfToken: '{{csrf_token()}}' }</script>

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/css.css') }}" >

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">

</head>
<body>
@section('auth')
    @show
@section('content')
    @show
<script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
@section('vueapp')
    @show
</body>
</html>