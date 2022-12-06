@extends('adminlte::page')

@section('title', 'Equipe')

@section('content_header')

    <h1>
        Equipe
        <a href="{{ route('equipe.create') }}" class="btn btn-sm btn-success">Novo Membro</a>
    </h1>
@endsection

@section('content')


        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
            @foreach ($team as $person)
                <tr>
                    <td>{{$person->id}}</td>
                    <td>{{$person->name}}</td>
                    <td>
                        <a href="{{ route('equipe.edit', ['equipe' => $person->id]) }}" class="btn btn-sm btn-info" method="post" >Editar</a>
                        <form class="d-inline" method="POST" action="{{ route('equipe.destroy', ['equipe' => $person->id]) }}" onsubmit="return confirm('Tem certeza de que deseja excluir?')">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>


    <script src="/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

@endsection
