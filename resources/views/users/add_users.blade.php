
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
    <form method="POST" action="{{route('users.store')}}">
        @csrf
<div class="mb-3">
<label for="exampleInputName" class="form-label">Nome</label>
<input type="Text" required name="name"  class="form-control" id="exampleInputName" aria-describedby="NameHelp">
</div>
@error('name')
<p>Nome nao Valido</p>
@enderror
<div class="mb-3">
<label for="exampleInputEmail1" class="form-label">Email address</label>
<input name="email" required type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
</div>
@error('email')
<p>Email não valido</p>
@enderror
<div class="mb-3">
<label for="exampleInputPassword1" class="form-label">Password</label>
<input name="password" required minlength="8" required type="password" class="form-control" id="exampleInputPassword1">
</div>
@error('password')
<p>Password Invalida</p>
@enderror
<button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
