@extends('adminlte::page')

@section('title', 'Informações')

@section('content_header')
    <h1>Informações</h1>
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
    <form action="{{route('info.update', ['info' => $about->id])}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
    @method('PUT')
    @csrf
    <div class="form-group">
        <div class="row">
            <label class="col-sm-2 control-label">Fone</label>
            <div class="col-sm-10">
                <input type="text" value="{{$about->phone}}" name="phone" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label class="col-sm-2 control-label">Whatsapp</label>
            <div class="col-sm-10">
                <input type="text" value="{{$about->whatsapp}}" name="whatsapp" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label class="col-sm-2 control-label">instagram</label>
            <div class="col-sm-10">
                <input type="text" value="{{$about->instagram}}" name="instagram" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label class="col-sm-2 control-label">Facebook</label>
            <div class="col-sm-10">
                <input type="text" value="{{$about->facebook}}" name="facebook" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label class="col-sm-2 control-label">E-mail</label>
            <div class="col-sm-10">
                <input type="text" value="{{$about->email}}" name="email" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label class="col-sm-2 control-label">Endereço</label>
            <div class="col-sm-10">
                <textarea name="address">{{$about->address}}</textarea>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label class="col-sm-2 control-label">Texto (Sobre Nós)</label>
            <div class="col-sm-10">
                <textarea name="text">{{$about->text}}</textarea>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label class="col-sm-2 control-label">Titulo (Sobre Nós)</label>
            <div class="col-sm-10">
                <input type="text" value="{{$about->title}}" name="title" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label class="col-sm-2 control-label">Logo</label>
            <div class="col-sm-10">
                <input type="file" name="logo" class="form-control-file">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label class="col-sm-2 control-label">Favicon</label>
            <div class="col-sm-10">
                <input type="file" name="favicon" class="form-control-file">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label class="col-sm-2 control-label">Imagem</label>
            <div class="col-sm-10">
                <input type="file" name="picture" class="form-control-file">
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="row">
            <label class="col-sm-2 control-label">Keywords (Usadas para encontrar a página)</label>
            <div class="col-sm-10">
                <input type="text" value="{{$about->keywords}}" name="keywords" class="form-control">
            </div>
        </div>
    </div>

    <hr>
    <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>
<script src="{{ asset('tinymce\js\tinymce\tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>tinymce.init({selector:'textarea'});</script>
<script>
    tinymce.init({

  selector: 'textarea',  // change this value according to your HTML
  force_br_newlines : true,
  force_p_newlines : false,
  plugins : 'advlist autolink link image lists charmap print preview',
  plugins: 'lists',
  language: 'tinymce\js\tinymce\langs\pt_BR.js'

});
</script>

@endsection
