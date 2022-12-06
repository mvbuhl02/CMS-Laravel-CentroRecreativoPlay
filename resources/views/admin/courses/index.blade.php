@extends('adminlte::page')

@section('title', 'Cursos')

@section('content_header')
    <h1>
        Meus Cursos
        <a href="{{ route('cursos.create') }}" class="btn btn-sm btn-success">Novo Curso</a>
    </h1>
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th >Título</th>
                <th >Ações</th>
            </tr>
        </thead>
            @foreach ($courses as $curso)
                <tr>
                    <td>{{$curso->id}}</td>
                    <td>{{$curso->title}}</td>
                    <td>
                        <a href="{{ route('cursos.edit', ['curso' => $curso->id]) }}" class="btn btn-sm btn-info">Editar</a>
                        <form  class="d-inline" method="POST" action="{{ route('cursos.destroy', ['curso' => $curso->id]) }}" onsubmit="return confirm('Tem certeza de que deseja excluir?')">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

    {{$courses->links('pagination::bootstrap-4')}}
@endsection
