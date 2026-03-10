@extends('layouts.fe_layout')
@section('content')
    <h5>Dados da Prenda {{ $gift->nome_da_prenda }}</h5>
<form method="POST" action="{{route('Easter.update')}}">
    @csrf
    @method('PUT')
        <div class="mb-3">
                <label for="exampleInputName" class="form-label">Nome</label>
                <input value="{{$gift->nome_da_prenda}}" type="Text" required name="name"  class="form-control" id="exampleInputName" aria-describedby="NameHelp">
        </div>
        @error('name')
            <p>Nome nao Valido</p>
        @enderror
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Valor Previsto</label>
            <input value="{{$gift->valor_previsto}}" name="valor_previsto" required type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

        </div>
         <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Valor Gasto</label>
            <input  value="{{$gift->valor_gasto}}" name="valor_gasto" required type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

        </div>
        <div class="mb-3">
            <label for="exampleInputName" class="form-label">Presenteado</label>
            <select name="user_id" class="form-control" id="exampleInputName">
                @foreach($users as $user)
                    <option value="{{$user->id}}" {{ $user->id == $gift->user_id ? 'selected' : '' }}>
                        {{$user->name}}
                    </option>
                @endforeach
            </select>
        </div>
        @error('password')
            <p>NIF Invalido</p>
        @enderror
            <input type="hidden" name="id" value="{{$gift->id}}">
            <button type="submit" class="btn btn-primary">Atualizar</button>
</form>
    <a href="{{ route('Easter.tabelaEaster') }}" class="btn btn-primary">Voltar</a>

@endsection
