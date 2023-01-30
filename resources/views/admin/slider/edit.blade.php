@extends('adminlte::page')

@section('title', 'Editar Slide')

@section('content_header')
    <h1>Editar Slide</h1>
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
        <form action="{{route('slider.update', ['slider' => $slide->id])}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
            @method('PUT')
            @csrf
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-1 control-label">Texto</label>
                    <div class="col-sm-10">
                        <textarea class="" name="text">{{$slide->text}}</textarea>
                    </div>
                </div>
            </div>
            <hr>
            <div class=" form-group">
                <div class="row">
                <label class="col-sm-1 control-label form-check-label">
                    Principal
                </label>
                    <input class="col-sm-3 form-check-input" type="checkbox" name="main" value="1" id="main">
                </div>
            </div>
            <hr>

                <input value="{{$slide->slide}}" class="form-control form-control-lg" id="formFile" type="file" name="filename[]" multiple>
                <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="{{ asset('tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
tinymce.init({
selector: 'textarea',  // change this value according to your HTML
selector: 'textarea',  // change this value according to your HTML

plugins: 'print preview fullpage powerpaste searchreplace autolink directionality advcode visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount tinymcespellchecker a11ychecker imagetools mediaembed  linkchecker contextmenu colorpicker textpattern help',
image_advtab: true,
a_plugin_option: true,
});

</script>
@endsection
