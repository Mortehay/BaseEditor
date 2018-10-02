@extends('wrapper')
@section('title', 'curves')
@section('content')
    <div id="app">
        <my-curve></my-curve>
    </div>

@endsection('content')
@section('vueapp')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection('vueapp')