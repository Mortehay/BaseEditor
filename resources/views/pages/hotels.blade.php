@extends('layouts.app')
@section('title', 'hotels')

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
