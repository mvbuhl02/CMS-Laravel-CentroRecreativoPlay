@extends('adminlte::page')

@section('title', 'Novo Membro')

@section('content_header')
    <h1>Novo Membro</h1>
@endsection

@section('content')

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

        <form action="{{route('equipe.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">

            @csrf
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">Nome</label>
                    <div class="col-sm-10">
                        <input placeholder="Nome do Curso" type="text" name="name"  class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">Foto</label>
                    <div class="col-sm-10">
                        <input type="file"  name="picture" class="form-control-file">
                    </div>
                </div>
            </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>
@endsection
