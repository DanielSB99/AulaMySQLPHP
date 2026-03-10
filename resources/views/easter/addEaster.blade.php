
@extends('layouts.fe_layout')
@section('content')

    <h2>Olá, aqui podes Adicionar as Prendas</h2>
    <form method="POST" action="{{route('Easter.store')}}">
        @csrf
<div class="mb-3">
<label for="exampleInputName" class="form-label">Nome do Presente </label>
<input type="Text" required name="name"  class="form-control" id="exampleInputName" aria-describedby="NameHelp">
</div>
@error('name')
<p>Nome do Presente nao Valido</p>
@enderror

<div class="mb-3">
<label for="valorPrevisto" class="form-label">Valor Previsto</label>
<input type="number" step="0.01" name="valor_previsto" class="form-control" id="valorPrevisto">
</div>



<div class="mb-3">
<label for="userSelect" class="form-label">Presenteado</label>
<select name="user_id" required class="form-select" id="userSelect">
    <option selected disabled value="">Selecione um utilizador</option>
    @foreach($users as $user)
        <option value="{{ $user->id }}">{{ $user->name }}</option>
    @endforeach
</select>
</div>
@error('user_id')
<p>Presenteado Invalido</p>
@enderror
<button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
