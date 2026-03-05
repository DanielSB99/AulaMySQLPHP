
@extends('layouts.fe_layout')
@section('content')

    <h2>Olá, aqui podes Adicionar Utilizadores</h2>
    <img src="{{asset('imgs/linux.jpg')}}" alt="">

     <h4>Utilizadores disponíveis:</h4>
        <ul>
            @foreach($usersNotFromDB as $user)
                <li>{{ $user['name'] }} - {{ $user['email'] }}</li>
            @endforeach
        </ul>

    @if($classDelegate)
        <h4>Se tiver esclarecimentos acerca da app, consulte o : {{ $classDelegate }}</h4>

    @endif
@endsection
