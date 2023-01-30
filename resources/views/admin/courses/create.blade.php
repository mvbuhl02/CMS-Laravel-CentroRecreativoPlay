@extends('adminlte::page')

@section('title', 'Novo curso')

@section('content_header')
    <h1>Novo Curso</h1>
@endsection

@section('content')
<script src="{{ asset('tinymce\js\tinymce\tinymce.min.js') }}" referrerpolicy="origin"></script>

<script>tinymce.init({selector:'textarea'});</script>
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

        <form action="{{route('cursos.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">

            @csrf
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">Título</label>
                    <div class="col-sm-10">
                        <input placeholder="Nome do Curso" type="text" name="title"  class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">Descrição</label>
                    <div class="col-sm-10">
                        <textarea class="" name="description"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">Imagem Principal</label>
                    <div class="col-sm-10">
                        <input type="file"  name="cover_image" class="form-control-file">
                    </div>
                </div>
            </div>
            <hr>
            <form class="form row" action="{{route('galleryOne.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input class="form-control form-control-lg" id="formFile" type="file" name="filename[]" multiple>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </form>
    </div>
</div>

<script src="{{ asset('tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
tinymce.init({
  selector: 'textarea',  // change this value according to your HTML

  plugins: ' image link media  table hr advlist lists textcolor anchor colorpicker textpattern help',
  image_advtab: true,
  a_plugin_option: true,
});

</script>
@endsection
