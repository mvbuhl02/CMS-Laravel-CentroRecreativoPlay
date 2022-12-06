@extends('adminlte::page')

@section('title', 'Novo slide')

@section('content_header')
    <h1>SLIDER</h1>
@endsection

@section('content')
<link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('/css/masonry.css')}}" rel="stylesheet">

<div class="card">
    <div class="card-body">
        <div class="row mt-5 g-1">
            <div class="masonry">
                @foreach ($slider as $i =>  $slide)
                    <div class=" wow fadeInUp" data-wow-delay="{{ $i / 10 }}s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                      <div class="brick">
                        <a data-bs-toggle="modal" data-bs-target="#course{{$slide->id}}">
                            <div class="card border-0 zoom">
                                <img src="{{asset('media/slider/'.$slide->slide)}}" class="card-img-top " alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$slide->text}}</h5>


                                        <a href="{{ route('slider.edit', ['slider' => $slide->id]) }}" class="btn btn-sm btn-info">Editar</a>

                                        <form  class="d-inline" method="POST" action="{{ route('slider.destroy', ['slider' => $slide->id]) }}" onsubmit="return confirm('Tem certeza de que deseja excluir?')">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-sm btn-danger">Excluir</button>
                                        </form>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>


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
                <h2 class="text-center bold ">ADICIONAR NOVO SLIDE</h2>
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
                    <div class=" container form-row">
                        <input class="form-check-input" type="checkbox" name="main" value="1" id="main">
                        <label class="form-check-label">
                            Principal
                        </label>
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
</div>

@endsection
