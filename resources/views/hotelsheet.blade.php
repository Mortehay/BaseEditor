@extends('wrapper')
@section('title', 'hotelsheet')
@section('auth')
    @if(isset(Auth::user()->email))
        <div class="alert alert-danger success-block row">
            <div class="col-sm-11">
                <strong>
                    welcome - {{Auth::user()->email}}
                </strong>
                <div class="col-sm-1"><a href="{{url('/hotels')}}" class="btn btn-primary"><strong>hotels</strong></a></div>
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
    {{Auth::user()}}
    <div class="container box">
        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <buntton class="close" type="button" data-dismiss="alert">x</buntton>
                <strong>{{$message}}</strong>
            </div>
        @endif
        <h3 align="center"> loged in :) </h3>

        @foreach($regions as $region)
            <li data-target="test-li" >{{ $region->id }} {{ $region->name }}</li>
        @endforeach
    </div>
@endsection('content')
