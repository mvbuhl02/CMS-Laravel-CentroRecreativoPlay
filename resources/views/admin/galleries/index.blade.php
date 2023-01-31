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
        @foreach ($pictures->where('course_id', $course->id) as $picture)

            <!-- Button trigger modal -->
              <button type="button" style="height: 20vh; background-size: cover; background-image: url({{asset('media/courses/pictures/'.$picture->filename)}})"  class="col-3 col-xs-4 col-md-2 col-lg-2 picture img-thumbnail" data-bs-toggle="modal" data-bs-target="#picture{{$picture->id}}">
              </button>

            <!-- Modal -->
            <div class="modal fade" id="picture{{$picture->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$picture->filename}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <img src="{{asset('media/courses/pictures/'.$picture->filename)}}" class="img-fluid">
                  </div>
                  <div class="modal-footer">
                    <form class="d-inline" method="POST" action="{{ route('galleryOne.destroy', $picture->id) }}" onsubmit="return confirm('Tem certeza de que deseja excluir?')">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger">Excluir</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
          <!-- List Images -->
             </div>
         </div>
        </div>

</div>
     @endforeach

     <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}" referrerpolicy="origin"></script>
     <script src="{{ asset('/js/galleryAjax.js') }}" referrerpolicy="origin"></script>
@endsection
