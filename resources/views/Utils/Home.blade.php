@extends('layouts.fe_layout')
@section('content')
    <h6>Homepage da Turma {{ $classname }}</h6>
    <p>
        O curso tem {{$cursoInfo['Classnr']}} estudantes,que é realizado em {{$cursoInfo['hrs']}} horas e a responsavel é {{$cursoInfo['responsable']}}

    </p>
    <h6>Informações do Cesae</h6>
    <p>
        Nome: {{$cesaeInfo['name']}}<br>
        Morada: {{$cesaeInfo['address']}}<br>
        Email: {{$cesaeInfo['email']}}
    </p>
    <h4>As tarefas disponiveis para fazer são:</h4>
    <ul>
        @foreach($tarefasAula as $tarefa)
                <li>{{ $tarefa }}</li>
            @endforeach
    </ul>

@endsection
