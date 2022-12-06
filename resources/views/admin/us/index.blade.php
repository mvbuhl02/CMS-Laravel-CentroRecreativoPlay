@extends('adminlte::page')

@section('title', 'Nos')

@section('content_header')
    <h1>
        Meus Parágrafos
        <a href="{{ route('nos.create') }}" class="btn btn-sm btn-success">Novo Parágrafo</a>
    </h1>
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th >Parágrafo</th>
                <th >Ações</th>
            </tr>
        </thead>
            @foreach ($us as $paragraph)
                <tr>
                    <td>{{$paragraph->id}}</td>
                    @php
                        $partes = explode("<br", $paragraph->text);
                    @endphp
                    <td>{!! $partes[0] !!}</td>
                    <td>
                        <a href="{{ route('nos.edit', ['no' => $paragraph->id]) }}" class="btn btn-sm btn-info">Editar</a>
                        <form  class="d-inline" method="POST" action="{{ route('nos.destroy', ['no' => $paragraph->id]) }}" onsubmit="return confirm('Tem certeza de que deseja excluir?')">
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
