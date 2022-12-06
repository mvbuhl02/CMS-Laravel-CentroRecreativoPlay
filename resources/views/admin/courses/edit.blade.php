@extends('adminlte::page')

@section('title', 'Editar Curso')

@section('content_header')
    <h1>Editar Curso</h1>
@endsection

@section('content')
<link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
           <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Adicionar Imagem a Galeria
                </button>
              </h2>
              <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
              </div>
            </div>
        </div>
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
        <form class="form row" action="{{route('galleryOne.store', ['picture' => $course->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input name="course_id" type="hidden" value="{{$course->id}}">
                <input class="form-control form-control-lg" id="formFile" type="file" name="filename[]" multiple>
                <button type="submit" class="btn btn-primary btn-lg btn-block">Salvar Novas Imagens</button>
           </form>
           <!-- ACCORDION -->
        <hr>
    <form action="{{route('cursos.update', ['curso' => $course->id])}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
    @method('PUT')
    @csrf

            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">Título</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" value="{{$course->title}}" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">Descrição</label>
                    <div class="col-sm-10">
                        <textarea class="" name="description">{{$course->description}}</textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">Imagem</label>
                    <div class="col-sm-10">
                        <input type="file" value="{{$course->cover_image}}" name="cover_image" class="form-control-file">
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
