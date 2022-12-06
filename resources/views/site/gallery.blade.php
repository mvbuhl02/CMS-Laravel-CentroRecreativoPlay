{{--
<div style="width: 100%; height:auto;" id="carousel-{{$course->id}}" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class='img-size img-fluid' src='media/courses/cover_images/{{$course->cover_image}}' alt='First slide' />
    </div>
    @foreach ($course->pictures as $picture)
      <div class="carousel-item">
        <img class='img-size' src='media/courses/pictures/{{$picture->filename}}' alt='Second slide' />
    </div>@endforeach
    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-{{$course->id}}" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carousel-{{$course->id}}" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>

<div class="container">
  <div class="row">
  @foreach ($course->pictures as $picture)
    <div class="p-1 col-6 col-sm-4 col-md-4 col-lg-4">
      <img class="img img-thumbnail" src="media/courses/pictures/{{$picture->filename}}">
    </div>
  @endforeach
  </div>
</div>


@foreach ($pictures as $pic)
    {{$pic}}
@endforeach

--}}
<html>

    <div class="card"></div>
    @foreach($pictures as $p)
        {{$p->id}}
    @endforeach

    <div id="paginacao">
      {{$pictures->render()}}
    </div>

    <script src="js/jquery-3.6.1.min.js"></script>

    <script>

    </script>
</html>
