@extends('layouts.fe_layout')
@section('content')
    <h5>Dados de User</h5>
    <p>Nome: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Nif: {{ $user->nif }}</p>
@endsection
