@extends('adminlte::page')

@section('title', 'Editar Parágrafo')

@section('content_header')
    <h1>Editar Parágrafo</h1>
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
    <form action="{{route('nos.update', ['no' => $us->id])}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
    @method('PUT')
    @csrf
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">Parágrafo</label>
                    <div class="col-sm-10">
                        <textarea class="" name="text">{{$us->text}}</textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">Imagem</label>
                    <div class="col-sm-10">
                        <input type="file" value="{{$us->picture}}" name="picture" class="form-control-file">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">
                    </label>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </div>
            </div>
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
