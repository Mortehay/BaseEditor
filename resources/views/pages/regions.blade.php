@extends('layouts.app')
@section('title', 'regions')

@section('content')
    {{--{{Auth::user()}}--}}
    <div class="container box">
        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <buntton class="close" type="button" data-dismiss="alert">x</buntton>
                <strong>{{$message}}</strong>
            </div>
        @endif
        <h3 align="center"> loged in :) </h3>
        <div class="container">
            <regions-list>
                {{--@foreach($regions as $region)
                    <li>{{ $region->name }}</li>
                @endforeach--}}
            </regions-list>
        </div>
    </div>
@endsection('content')