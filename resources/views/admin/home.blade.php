@extends('adminlte::page')

@section('plugins.Chartjs', true)

@section('title', 'Painel')

@section('content_header')
    <div class="row">
        <div class="col-md-6">
            <h1>Dashboard</h1>
        </div>
        <div class="col-md-6">
            <form  method="GET">
                <select onchange="this.form.submit()" name="interval" class="float-md-right rounded border selectpicker form-control col-md-6">
                    <option {{$dateInterval == 30?'selected="selected"':''}} value="30">Últimos 30 dias</option>
                    <option {{$dateInterval == 60?'selected="selected"':''}} value="60">Últimos 2 mêses</option>
                    <option {{$dateInterval == 90?'selected="selected"':''}} value="90">Últimos 3 mêses</option>
                    <option {{$dateInterval == 120?'selected="selected"':''}} value="120">Últimos 6 mêses</option>
                </select>
            </form>

        </div>
    </div>


@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$visitsCount}}</h3>
                <p>Visitas</p>
            </div>
            <div class="icon">
                <i class="far fa-fw fa-eye">
                </i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$cursoCount}}</h3>
                <p>Cursos</p>
            </div>
            <div class="icon">
                <i class="far fa-fw fa-file">
                </i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{$onlineCount}}</h3>
                <p>Gestores Online</p>
            </div>
            <div class="icon">
                <i class="far fa-fw fa fa-users">
                </i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{$userCount}}</h3>
                <p>Gestores</p>
            </div>
            <div class="icon">
                <i class="far fa-fw fa fa-users">
                </i>
                </div>
            </div>
        </div>
        </div>

        <div class="row">

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cursos mais visitados</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="pagePie"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Sobre o sistema</h3>
                    </div>
                    <div class="card-body">
                        ...
                    </div>
                </div>
            </div>
        </div>
        <script>
            window.onload = function(){
                var ctx = document.getElementById("pagePie").getContext("2d");
                window.myPie = new Chart(ctx, {
                type:'pie',
                data:{
                    datasets:[{
                        data:{{$cursoValues}},
                        backgroundColor:'#0000FF'
                    }],
                    labels:{!!$cursoLabels!!}
                },
                options:{
                    responsive:true,
                    legend:{
                        display:false
                    }
                }

                });
                var bctx = document.getElementById("bar-chart").getContext("2d");
    window.myBar = new Chart(bctx, barChartData);
            }
        </script>
@endsection



