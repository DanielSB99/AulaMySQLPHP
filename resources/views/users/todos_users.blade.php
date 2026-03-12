@extends('layouts.fe_layout')
@section('content')
    @if(session('message'))
        <div class="alert alert-sucess">
            <p>{{session('message')}}</p>
         </div>
    @endif

    <h2 class="text-center">Todos Os Users</h2><p></p>
           <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Nif</th>
      @auth
      <th scope="col">Detalhes</th>
      @if(Auth::user()->email == 'admin@gmail.com')
        <th scope="col">Apagar</th>
        @endif
      @endauth

    </tr>
  </thead>
  <tbody>
    @foreach ($usersFromDB as $user )
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->nif }}</td>
            @auth
                <td><a class="btn btn-info" href="{{route('users.view',$user->id)}}">Ver/ Editar</a></td>
                @if(Auth::user()->email == 'admin@gmail.com')
        <td><a href="{{ route('users.delete', $user->id) }}" class="btn btn-danger">Apagar</a></td>
        @endif

            @endauth


        </tr>

    @endforeach
        <form>
            <input type="text" placeholder="pesquisa" name="search" id="">
            <button class="btn btn-secondary">Procurar</button>
        </form>
  </tbody>
</table>

@endsection

