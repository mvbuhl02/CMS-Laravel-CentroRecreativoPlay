@extends('adminlte::page')

@section('title', 'Nova Informação')

@section('content_header')
    <h1>Nova Informação</h1>
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

        <form action="{{route('info.store')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">

            @csrf
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">Fone</label>
                    <div class="col-sm-10">
                        <input type="text" name="phone" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">Whatsapp</label>
                    <div class="col-sm-10">
                        <input type="text" name="whatsapp" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">instagram</label>
                    <div class="col-sm-10">
                        <input type="text" name="instagram" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">Facebook</label>
                    <div class="col-sm-10">
                        <input type="text" name="facebook" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">E-mail</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">Endereço</label>
                    <div class="col-sm-10">
                        <textarea class="" name="address"></textarea>
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
                    <label class="col-sm-2 control-label">Imagem (nós)</label>
                    <div class="col-sm-10">
                        <input type="file" name="picture" class="form-control-file">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">Titulo (Sobre nós)</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">Keywords (Usadas para encontrar a página)</label>
                    <div class="col-sm-10">
                        <input type="text" name="keywords" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">Texto (Sobre nós)</label>
                    <div class="col-sm-10">
                        <textarea name="text"></textarea>
                    </div>
                </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
