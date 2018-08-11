@extends('wrapper')
@section('title', 'login')
@section('auth')
    @if(!isset(Auth::user()->email))
        {{--<script>window.location="/";</script>--}}
    @endif
@endsection('auth')
@section('content')
    <div class="container box">
        <h3 align="center"> login </h3>

        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <buntton class="close" type="button" data-dismiss="alert">x</buntton>
                <strong>{{$message}}</strong>
            </div>
        @endif
        @if(count($errors) >0 )
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{url('/login/checklogin')}}">
            {{csrf_field()}}
            <div class="form-group">
                <label for="email">input email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">input password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" name="login" class="btn btn-primary" value="login">
            </div>
        </form>
    </div>
@endsection('content')
