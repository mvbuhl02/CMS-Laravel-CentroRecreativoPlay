@extends('adminlte::page')

@section('title', 'Nova Imagem')

@section('content_header')
    <h1>Nova Imagem</h1>
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

        <form action="{{route('galeria.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">

            @csrf
            <div class="form-group">
                <div class="row">
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">IMAGEM</label>
                    <div class="col-sm-10">
                        <input type="file" name="imagem" class="form-control-file">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">NOME</label>
                    <div class="col-sm-10">
                        <input type="text" name="titulo"  class="form-control">
                    </div>
                </div>
            </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                        <input type="submit" value="Criar" class="btn btn-success">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
