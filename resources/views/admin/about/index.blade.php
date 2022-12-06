@extends('adminlte::page')

@section('title', 'Informações')

@section('content_header')
<h1>
    Adicionar informação
    @forelse ($about as $info)

    @empty

    <a href="{{ route('info.create') }}" class="btn btn-sm btn-success">Nova Informação</a>
    @endforelse
</h1>
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th >Data da Última Atualização</th>
                <th >Ações</th>
            </tr>
        </thead>
            @foreach ($about as $info)
                <tr>
                    <td>{{$info->id}}</td>
                    <td>{{ $info->updated_at->format('d/m/Y')}}</td>
                    <td>
                        <a href="{{ route('info.edit', ['info' => $info->id]) }}" class="btn btn-sm btn-info">Editar</a>
                        <form  class="d-inline" method="POST" action="{{ route('info.destroy', ['info' => $info->id]) }}" onsubmit="return confirm('Tem certeza de que deseja excluir?')">
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
@endsection
