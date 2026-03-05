@extends('layouts.fe_layout')
@section('content')
    <h5>Dados de User</h5>
    <p>Nome: {{ $tarefa->name }}</p>
    <p>Email: {{ $tarefa->description }}</p>
    <p>Responsavel: {{ $tarefa->responsavel }}</p>


@endsection
