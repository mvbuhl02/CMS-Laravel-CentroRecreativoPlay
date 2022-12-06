@extends('adminlte::page')

@section('title', 'Novo parágrafo')

@section('content_header')
    <h1>Novo parágrafo</h1>
@endsection

@section('content')
<script src="{{ asset('tinymce\js\tinymce\tinymce.min.js') }}" referrerpolicy="origin"></script>

<script>tinymce.init({selector:'textarea'});</script>
<div class="card">
    <div class="card-body">

        <form action="{{route('nos.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">Descrição</label>
                    <div class="col-sm-10">
                        <textarea name="text"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">Imagem</label>
                    <div class="col-sm-10">
                        <input type="file"  name="picture" class="form-control-file">
                    </div>
                </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>

    </div>
</div>

<script src="{{ asset('tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
tinymce.init({
  selector: 'textarea',  // change this value according to your HTML
  plugins: 'a_tinymce_plugin',
  a_plugin_option: true,
  a_configuration_option: 400
});

</script>
@endsection
