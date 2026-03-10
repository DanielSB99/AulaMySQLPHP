
@extends('layouts.fe_layout')
@section('content')

    <h2>Olá, aqui podes Adicionar Tarefas</h2>
    <form method="POST" action="{{route('tasks.store')}}">
        @csrf
<div class="mb-3">
<label for="exampleInputName" class="form-label">Nome da Tarefa</label>
<input type="Text" required name="name"  class="form-control" id="exampleInputName" aria-describedby="NameHelp">
</div>
@error('name')
<p>Nome da Tarefa nao Valido</p>
@enderror
<div class="mb-3">
<label for="taskDescription" class="form-label">Descrição da Tarefa</label>
<textarea required name="descricaoTarefa" class="form-control" id="taskDescription" rows="3"></textarea>
</div>
@error('descricaoTarefa')
<p>Descrição da Tarefa nao Valido</p>
@enderror
<div class="mb-3">
<label for="userSelect" class="form-label">Utilizadores</label>
<select name="user_id" required class="form-select" id="userSelect">
    <option selected disabled value="">Selecione um utilizador</option>
    @foreach($users as $user)
        <option value="{{ $user->id }}">{{ $user->name }}</option>
    @endforeach
</select>
</div>
@error('user_id')
<p>Utilizador Invalido</p>
@enderror
<button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
