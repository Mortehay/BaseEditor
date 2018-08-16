@extends('wrapper')
@section('title', 'hotels')
@section('auth')
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
@endsection('auth')
@section('content')
    <div id="app">
        <hotels-navbar></hotels-navbar>
        <hotels-search></hotels-search>
        <div class="container">
            <hotels-list>

            </hotels-list>
        </div>
    </div>
@endsection('content')

@section('vueapp')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection('vueapp')