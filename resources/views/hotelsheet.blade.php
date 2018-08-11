@extends('layout')
@section('title', 'hotels')
@section('content')
        <ul>
            {{--@foreach($hotels as $hotel)
                <li data-target="test-li" >{{ $hotel->id }} {{ $hotel->name }}</li>
            @endforeach--}}
            @foreach($regions as $region)
                <li data-target="test-li" >{{ $region->id }} {{ $region->name }}</li>
            @endforeach
        </ul>
@endsection('content')
