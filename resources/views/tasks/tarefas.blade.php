@extends('layouts.fe_layout')
@section('content')
 <h2 class="text-center">Todas as Tarefas</h2><p></p>
           <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nome</th>
      <th scope="col">Tarefa</th>
      <th scope="col">Status</th>
      <th scope="col">Data de Vencimento</th>
      <th scope="col">Pessoa Responsavel</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($todasTarefasFromDB as $tarefa )
        <tr>
            <th scope="row">{{ $tarefa->id }}</th>
            <td>{{ $tarefa->name }}</td>
            <td>{{ $tarefa->description}}</td>
             <td>{{$tarefa->status == 1 ? 'Concluída' : 'Pendente'}}</td>
            <td>{{$tarefa->due_date}}</td>
            <td>{{$tarefa->responsavel}}</td>
            <td><a class="btn btn-info" href="{{route('Tarefas.view',$tarefa->id)}}">Ver/ Editar</a></td>
            <td><a href="{{ route('Tarefas.delete', $tarefa->id) }}" class="btn btn-danger">Apagar</a></td>
        </tr>

    @endforeach

  </tbody>
</table>



@endsection
