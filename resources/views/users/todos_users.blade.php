@extends('layouts.fe_layout')
@section('content')

    <h2 class="text-center">Todos Os Users</h2><p></p>
           <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Nif</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($usersFromDB as $user )
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->nif }}</td>
            <td><a class="btn btn-info" href="{{route('users.view',$user->id)}}">Ver</a></td>
            <td><a href="{{ route('users.delete', $user->id) }}" class="btn btn-danger">Apagar</a></td>

        </tr>

    @endforeach

  </tbody>
</table>

@endsection
