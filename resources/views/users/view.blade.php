@extends('layouts.fe_layout')
@section('content')
    <h5>Dados de User {{ $user->name }}</h5>

<form method="POST" action="{{route('users.update')}}">
    @csrf
    @method('PUT')
        <div class="mb-3">
                <label for="exampleInputName" class="form-label">Nome</label>
                <input value="{{$user->name}}" type="Text" required name="name"  class="form-control" id="exampleInputName" aria-describedby="NameHelp">
        </div>
        @error('name')
            <p>Nome nao Valido</p>
        @enderror
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input disabled value="{{$user->email}}" name="email" required type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Nif</label>
            <input value="{{$user->nif}}" type="text"  name="nif"  class="form-control" id="exampleInputName" aria-describedby="NameHelp">
        </div>
        @error('password')
            <p>NIF Invalido</p>
        @enderror
            <input type="hidden" name="id" value="{{$user->id}}">
            <button type="submit" class="btn btn-primary">Atualizar</button>
</form>
@endsection
