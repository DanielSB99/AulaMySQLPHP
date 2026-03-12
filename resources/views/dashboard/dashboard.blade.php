@extends('layouts.fe_layout')
@section('content')
    @auth
        @if (Auth::user()->type == 1)
        <h1>Ola Admin {{Auth::user()->name}}</h1>
        @else
        <h1>Ola {{Auth::user()->name}}</h1>

        @endif
    @endauth
@endsection
