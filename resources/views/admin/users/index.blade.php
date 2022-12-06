@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>
        Gestores
        <a href="{{ route('users.create') }}" class="btn btn-sm btn-success">Novo Gestor</a>
    </h1>
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Administrador</th>
                <th>Ações</th>
            </tr>
        </thead>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if ($user->admin == 1)
                        <button class="btn btn-sm btn-success"></button>
                        @else
                        <button class="btn btn-sm btn-danger"></button>
                        @endif

                    </td>
                    <td>
                        <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-sm btn-info">Editar</a>

                        @if($loggedId !== $user->id)
                        <form class="d-inline" method="POST" action="{{ route('users.destroy', ['user' => $user->id]) }}" onsubmit="return confirm('Tem certeza de que deseja excluir?')">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

    {{$users->links('pagination::bootstrap-4')}}

@endsection
