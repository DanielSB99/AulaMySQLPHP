@extends('layouts.fe_layout')
@section('content')
    <h5>Dados da Prenda</h5>
    <p>Nome: {{ $gift->nome_da_prenda }}</p>
    <p>Valor Previsto: {{ $gift->valor_previsto }}</p>
    <p>Valor Gasto: {{ $gift->valor_gasto }}</p>
    <td>Diferença de Valores: {{ $gift->diferenca }} €</td>
    <p>Presenteado: {{ $gift->user_name }}</p>
    <a href="{{ route('Easter.tabelaEaster') }}" class="btn btn-primary">Voltar</a>

@endsection
