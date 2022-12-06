@extends('adminlte::page')

@section('title', 'Novo curso')

@section('content_header')
    <h1>SLIDER</h1>
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

        <form action="{{route('slider.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">

            @csrf
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">Texto</label>
                    <div class="col-sm-10">
                        <textarea class="" name="text"></textarea>
                    </div>
                </div>
            </div>
            <hr>
            <form class="form row" action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input  class="form-control form-control-lg" id="formFile" type="file" name="filename[]" multiple>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="{{ asset('tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
tinymce.init({
  selector: 'textarea',  // change this value according to your HTML
  fullpage_default_text_color: 'blue'

});

</script>
@endsection
