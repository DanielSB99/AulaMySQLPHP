@extends('layouts.fe_layout')
@section('content')
    <h5>Dados da tarefa: {{ $tarefa->name }}</h5>
<form method="POST" action="{{route('tasks.update')}}">
    @csrf
    @method('PUT')
        <div class="mb-3">
                <label for="taskName" class="form-label">Nome da Tarefa</label>
                <input value="{{$tarefa->name}}" type="text" required name="name"  class="form-control" id="taskName">
        </div>
        @error('name')
            <p class="text-danger">Nome da Tarefa não é válido</p>
        @enderror

        <div class="mb-3">
            <label for="taskDescription" class="form-label">Descrição da Tarefa</label>
            <textarea name="descricaoTarefa" class="form-control" id="taskDescription" rows="3">{{$tarefa->description}}</textarea>
        </div>
        @error('descricaoTarefa')
            <p class="text-danger">Descrição da Tarefa não é válida</p>
        @enderror

        <div class="mb-3">
            <label for="userSelect" class="form-label">Responsável</label>
            <select name="user_id" required class="form-select" id="userSelect">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $tarefa->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>
        @error('user_id')
            <p class="text-danger">Utilizador inválido</p>
        @enderror

        <div class="mb-3">
            <label for="statusSelect" class="form-label">Estado</label>
            <select name="status" class="form-select" id="statusSelect">
                <option value="0" {{ $tarefa->status == 0 ? 'selected' : '' }}>Pendente</option>
                <option value="1" {{ $tarefa->status == 1 ? 'selected' : '' }}>Concluída</option>
            </select>
        </div>
        @error('status')
            <p class="text-danger">Estado inválido</p>
        @enderror

            <input type="hidden" name="id" value="{{$tarefa->id}}">
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('Tarefas.todos') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
