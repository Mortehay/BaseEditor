<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.laravel ={ scrfToken: '{{csrf_token()}}' }</script>

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/css.css') }}" >

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">


</head>
<body>
@if(isset(Auth::user()->email))
    <div class="alert alert-danger success-block row">
        <div class="col-sm-11">
            <strong>
                welcome - {{Auth::user()->email}}
            </strong>
            <div class="col-sm-1"><a href="{{url('/hotelsheet')}}" class="btn btn-primary"><strong>hotelsheet</strong></a></div>
        </div>

        <br>
        <div class="col-sm-1">
            <a href="{{ url('/login/logout') }}" class="btn btn-info">logout</a>
        </div>
    </div>
@else
    <script>
        window.location = '/';
    </script>
@endif
<div id="app">
    <hotels-navbar></hotels-navbar>
    <hotels-search></hotels-search>
        <div class="container">
        <hotels-list>

        </hotels-list>
    </div>
</div>

<script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
