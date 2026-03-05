@extends('layouts.fe_layout')
@section('content')
 <h2 class="text-center">Lista de Prendas de Páscoa</h2><p></p>
           <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Nome da Prenda</th>
      <th scope="col">Valor Previsto</th>
      <th scope="col">Valor Gasto</th>
      <th scope="col">Diferença</th>
      <th scope="col">Presenteado</th>
      <th scope="col">Detalhes</th>
      <th scope="col">Apagar</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($easterGifts as $gift)
        <tr>
            <td>{{ $gift->nome_da_prenda }}</td>
            <td>{{ $gift->valor_previsto }} €</td>
            <td>{{ $gift->valor_gasto }} €</td>
            <td>{{ $gift->diferenca }} €</td>
            <td>{{ $gift->user_name }}</td>
            <td><a class="btn btn-info" href="{{ route('Easter.view', $gift->id) }}">Ver Detalhes</a></td>
            <td><a href="{{ route('Easter.delete', $gift->id) }}" class="btn btn-danger">Apagar</a></td>
        </tr>

    @endforeach

  </tbody>
</table>



@endsection
