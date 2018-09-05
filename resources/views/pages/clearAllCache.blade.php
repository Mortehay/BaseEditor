@extends('layouts.wrapper')
@section('title', 'clear-all-cache')
@section('content')
        <ul>
            @foreach($cache_log as $clearAllCacheMessage)
                <li data-target="test-li" > {!!  $clearAllCacheMessage !!} </li>
            @endforeach
        </ul>
@endsection('content')
