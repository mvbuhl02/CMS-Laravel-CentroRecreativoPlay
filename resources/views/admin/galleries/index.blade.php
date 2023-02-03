@extends('adminlte::page')

@section('title', 'Galeria')

@section('content_header')
    <h1>
        Fotos
    </h1>

@endsection
@section('content')

<link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<style>
    a{
        text-decoration: none;
    }
</style>
<!-- ACCORDION -->
@foreach ($courses as $course)
<div class="accordion accordion-flush" id="accordionFlushExample">
    <!-- Gallery One -->

    <div class="accordion-item">
     <!-- Accordion Button Gallery One -->

     <h2 class="accordion-header" id="flush-headingThree">
         <button class="accordion-button collapsed"  onClick="reply_click(this.id)" id="{{$course->id}}" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne{{$course->id}}" aria-expanded="false" aria-controls="flush-collapseOne">
             {{$course->title}}
         </button>
     </h2>

     <div id="flush-collapseOne{{$course->id}}" onClick="reply_click(this.id)" id="{{$course->id}}" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
       <div class="accordion-body">
        <form class="form row" action="{{route('galleryOne.store', ['picture' => $course->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input name="course_id" type="hidden" value="{{$course->id}}">
            <input class="form-control form-control-lg" id="formFile" type="file" name="filename[]" multiple>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Salvar Novas Imagens</button>
       </form>
       <br>


       <div class="row">

        <div id="images-container{{$course->id}}">

        </div>
        <button onclick="reply_click({{$course->id}})" id="fetch-images">Fetch Images</button>

        </div>
          <!-- List Images -->
             </div>
         </div>
        </div>

</div>
     @endforeach

<div id="images-container"></div>
     <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}" referrerpolicy="origin"></script>
     <script src="{{ asset('js/galleriesAjax.js') }}"></script>
@endsection
