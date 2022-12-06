@extends('adminlte::page')

@section('title', 'Novo Usuário')

@section('content_header')
    <h1>Novo Usuário</h1>
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
        <form action="{{route('users.store')}}" method="POST" class="form-horizontal">
            @csrf
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">Nome Completo</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" value="{{old('name')}}" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">E-mail</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" value="{{old('email')}}" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">Senha</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label">Confirmação da senha</label>
                    <div class="col-sm-10">
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input class="form-check-input" type="checkbox" name="admin" value="1" id="admin">
                <label class="form-check-label">
                    Permissão de Administrador
                </label>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                        <input type="submit" value="Cadastrar" class="btn btn-success">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
