@extends('layouts.app')
@section('title', 'hotelsheet')

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
