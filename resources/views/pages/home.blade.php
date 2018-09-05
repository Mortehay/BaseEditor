@extends('layouts.app')
@section('title', 'home')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (Auth::user())
                <div class="card">
                    <div class="card-header">LogedIn {{Auth::user()->email}}</div>

                    <div class="card-body">



                        You are logged in!
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
@section('bottom-scripts')
    <script src="{{ asset('js/main.js') }}"></script>
@endsection
