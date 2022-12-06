@extends('adminlte::page')

@section('title', 'Editar Membro')

@section('content_header')
    <h1>Editar Membro</h1>
@endsection

@section('content')
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">

@if($errors->any())

<div class="alert alert-danger">
    <ul>
        <h4>Ocorreu um erro</h4>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card">
    <div class="card-body">
        <form action="{{route('equipe.update', ['equipe' => $team->id])}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
            @method('PUT')
            @csrf
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" value="{{$team->name}}" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">Imagem</label>
                    <div class="col-sm-10">
                        <input type="file" value="{{$team->picture}}" name="picture" class="form-control-file">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">
                    </label>
                    <div class="col-sm-10">
                        <input type="submit" value="Salvar" class="btn btn-success">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="{{ asset('tinymce\js\tinymce\tinymce.min.js') }}" referrerpolicy="origin"></script>

@endsection
