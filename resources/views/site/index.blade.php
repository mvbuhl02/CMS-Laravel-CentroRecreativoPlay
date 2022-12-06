<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Centro de Recreação Play</title>

    <!-- SEO -->
    @foreach ($about as $seo)
        <meta content="{{$seo->keywords}}" name="keywords">
        <meta content="{{$seo->title}}" name="description">
        <link rel="icon" type="imagem/png" href="media\about\{{$seo->favicon}}"/>
    @endforeach

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/labs.css" rel="stylesheet">
    <link href="css/masonry.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/fontawesome-free-6.2.0-web/css/all.min.css" rel="stylesheet">


</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="51">
    <div class="container-xxl bg-white p-0">
        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0" id="home">
              <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0 sticky-top shadow-sm">
                @foreach ($about as $seo)
                  <a href="" class="navbar-brand p-0">
                    <img styel="width:90px; max-height:100px" src="{{asset('/media/about/'.$seo->logo)}}" alt="Logo">
                  </a>
                @endforeach
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                      <span class="fa fa-bars"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav mx-auto py-0">
                        <a href="#home" class="nav-item nav-link active">Home</a>
                        <a href="#nos" class="nav-item nav-link">Nós</a>
                        <a href="#cursos" class="nav-item nav-link">Cursos</a>
                        <a href="#galeria" class="nav-item nav-link">Galeria</a>
                        <a href="#equipe" class="nav-item nav-link">Equipe</a>
                        <a href="#contato" class="nav-item nav-link">Contato</a>
                    </div>
                      <a href="/painel" class="btn btn-primary-gradient rounded-pill py-2 px-4 d-lg-block">Login</a>
                  </div>
              </nav>

              <section id="control" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                            <div class="carousel-item active" style="background-image:url('media/slider/{{$main_slide->slide}}');">
                            </div>
                    @foreach ($slider as $slide)
                    <div class="carousel-item" style="background-image:url('media/slider/{{$slide->slide}}');">
                        @isset($slide->text)
                        <div class="text-slide align-middle text-light col-xs-1" align="center">
                            <h2 >{!! $slide->text !!}</h2>
                        </div>
                    @endisset
                    </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#control" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#control" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </section>
        </div>



        <!-- Nos Start -->
        <section class="container-xxl py-5" id="nos">
            <div class="container py-5 px-lg-5">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                </div>
                <div class="row g-5 align-items-center">
                    <picture class="col-lg-6">
                        <img alt="Figura complementar" class="img-fluid wow fadeInUp" src="{{asset('/media/about/'.$seo->picture)}}" data-wow-delay="0.1s" src="">
                    </picture>
                    <article class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                        @foreach ($about as $seo)

                        <h1 style="color: white;">{{$seo->title}}</h1>
                        <p class="wow fadeInUpdata-wow-delay="0.3s" style="color: white;">
                            {!! html_entity_decode($seo->text) !!}
                        </p>
                        @endforeach
                        <a data-bs-toggle="modal" data-bs-target="#modalNos"  class="btn btn-primary-gradient py-sm-3 px-4 px-sm-5 rounded-pill mt-3">NOSSA HISTÓRIA</a>
                    </article>
                </div>
            </div>
        </section>


        <div class="modal " id="modalNos" tabindex="-1" aria-labelledby="modalNos" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalNos">Hitória</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            @foreach ($us as $p)

                                            @if ($p->id % 2 == 0)
                                            <div class="row">
                                              <div class="col-sm">
                                                <img src="media/us/{{$p->picture}}" alt="">
                                              </div>
                                              <div class="col-sm">
                                                <p class="fs-2 text">
                                                {!! html_entity_decode($p->text) !!}
                                                </p>
                                                <hr>
                                                <br>
                                            </div>
                                            </div>
                                            @else
                                            <div class="row">
                                                <div class="col-sm">
                                                  <p class="fs-2 text">
                                                  {!! html_entity_decode($p->text) !!}
                                                  </p>
                                                  <hr>
                                                  <br>
                                              </div>
                                              <div class="col-sm">
                                                <img src="media/us/{{$p->picture}}" alt="">
                                              </div>
                                              </div>
                                            @endif
                                        @endforeach
                                        </div>
                                        </div>
                                    </div>
                                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>



        <!-- Corsos Start -->
        <section class="container" id="cursos">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <div class="card border-0">
                        <div class="card-body">
                            <h2 class="fs-1 text-primary">Cursos</h2>
                        </div>
                    </div>
                </div>
                <div class="row mt-5 g-1">
                    <div class="masonry">
                        @foreach ($courses as $i =>  $course)
                            <div class=" wow fadeInUp" data-wow-delay="{{ $i / 10 }}s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                              <div class="brick">
                                <a data-bs-toggle="modal" data-bs-target="#course{{$course->id}}">
                                    <div class="card border-0 zoom">
                                        <img src="media/courses/cover_images/{{$course->cover_image}}" class="card-img-top " alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">{{$course->title}}</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
            </section>

                <!-- Modal -->
                @foreach ($courses as $i =>  $course)
                    <section class="modal modal-course fade" id="course{{$course->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content rounded">
                                <div class="modal-header">
                                    <h2 class="modal-title text-primary" id="exampleModalLabel">{{$course->title}}</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-sm">
                                                            <img style="width: 100%" src="media/courses/cover_images/{{$course->cover_image}}" alt="">
                                                        </div>
                                                        <div class="col-sm">
                                                            <p>
                                                                {!! $course->description !!}
                                                            </p>
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </section>

    @endforeach
        <!-- Modal End -->

        <!-- Galeria Start -->
        <div id="galeria" class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                  <h2 class="mb-5 text-primary-gradient">Galeria</h2>
              </div>

              <div class="masonry">
                @foreach ($courses as $i =>  $course)
                    <div class="wow fadeInUp" data-wow-delay="{{ $i / 10 }}s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                        <a data-bs-toggle="modal" onClick="reply_click(this.id)" id="{{$course->id}}" data-bs-target="#gallery{{$course->id}}">
                        <div class="brick zoom">
                                <div class="gallery-picture">
                                    <h2 class="text-uppercase  fs-2 text-lg-center">{{$course->title}}</h2>
                                    <img class="img-gallery" src="media/courses/cover_images/{{$course->cover_image_gallery}}">
                                </div>
                            </div>
                        </a>
                    </div>
            @endforeach
            </div>
        </div>

        <!-- modal -->
        @foreach ($courses as $i =>  $course)
        <div class="modal modal-gallery fade"  id="gallery{{$course->id}}" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <!-- carousel -->
                  <div class="modal-body">


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
                </div>
            </div>
        </div>
          </div>
          @endforeach









            <!-- Team Start -->
               <div class="container-xxl py-5" id="equipe">
                <div class="container py-5 px-lg-5">
                    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h2 class="mb-5 text-primary-gradient">Equipe</h2>
                    </div>
                    <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                        <div class="testimonial-item rounded p-4">
                            <div class="row-2">
                                    @foreach ($team as $person)
                                    <div class="card-body col-6">
                                        <img class="img-fluid rounded-circle" src="media/team/{{$person->picture}}">
                                        <br>
                                        <h5 class="h3 row justify-content-center card-title">{{$person->name}}</h5>
                                    </div>
                                     @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




        <!-- Testimonial Start -->
        <div class="container-xxl py-5" id="equipe">
            <div class="container py-5 px-lg-5">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h2 class="mb-5 text-primary-gradient">Equipe</h2>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                    <div class="testimonial-item rounded p-4">
                        <div class="card-body">
                            @foreach ($team as $person)
                            <div class="card-body col-6">
                                <img class="img-fluid rounded-circle" src="media/team/{{$person->picture}}">
                                <br>
                                <h5 class="h3 row justify-content-center card-title">{{$person->name}}</h5>
                            </div>
                             @endforeach
                        </div>
                    </div>
                    <div class="testimonial-item rounded p-4">
                        <div class="card-body">
                            <img class="img-fluid rounded-circle" src="http://conteudo.imguol.com.br/c/entretenimento/7b/2021/01/15/estatua-da-liberdade-1610722480501_v2_1920x1280.jpg" width="100%">
                            <h5 class="card-title">name</h5>
                        </div>
                    </div>
                    <div class="testimonial-item rounded p-4">
                        <div class="card-body">
                            <img class="img-fluid rounded-circle" src="http://conteudo.imguol.com.br/c/entretenimento/7b/2021/01/15/estatua-da-liberdade-1610722480501_v2_1920x1280.jpg" width="100%">
                            <h5 class="card-title">name</h5>
                        </div>
                    </div>
                    <div class="testimonial-item rounded p-4">
                        <div class="card-body">
                            <img class="img-fluid rounded-circle" src="http://conteudo.imguol.com.br/c/entretenimento/7b/2021/01/15/estatua-da-liberdade-1610722480501_v2_1920x1280.jpg" width="100%">
                            <h5 class="card-title">name</h5>
                        </div>
                    </div>
                    <div class="testimonial-item rounded p-4">
                        <div class="card-body">
                            <img class="img-fluid rounded-circle" src="http://conteudo.imguol.com.br/c/entretenimento/7b/2021/01/15/estatua-da-liberdade-1610722480501_v2_1920x1280.jpg" width="100%">
                            <h5 class="card-title">name</h5>
                        </div>
                    </div>

                    <div class="testimonial-item ">
                        <div class="card-body">
                            <img class="img-fluid rounded-circle" src="http://conteudo.imguol.com.br/c/entretenimento/7b/2021/01/15/estatua-da-liberdade-1610722480501_v2_1920x1280.jpg" width="100%">
                            <h5 class="card-title">name</h5>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Testimonial End -->

        <!-- Footer Start -->
        @foreach ($about as $info)
        <div id="contato" class="container-fluid bg-primary text-light footer wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5 px-lg-5">
                <div class="row g-5">
                    <div class="col-md-6 col-lg-3">
                        <h4 class="text-white mb-4">Address</h4>
                        <p><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>

                        <a style="color:white" href="tel:+5571999999999">
                        <p><i class="fa fa-phone-alt me-3"></i>{{$info->phone}}</p>
                        </a>

                        <p><i class="fa fa-envelope me-3"></i>info@example.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h4 class="text-white mb-4">Quick Link</h4>
                        <a class="btn btn-link" href="">About Us</a>
                        <a class="btn btn-link" href="">Contact Us</a>
                        <a class="btn btn-link" href="">Privacy Policy</a>
                        <a class="btn btn-link" href="">Terms & Condition</a>
                        <a class="btn btn-link" href="">Career</a>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h4 class="text-white mb-4">Popular Link</h4>
                        <a class="btn btn-link" href="">About Us</a>
                        <a class="btn btn-link" href="">Contact Us</a>
                        <a class="btn btn-link" href="">Privacy Policy</a>
                        <a class="btn btn-link" href="">Terms & Condition</a>
                        <a class="btn btn-link" href="">Career</a>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h4 class="text-white mb-4">Newsletter</h4>
                        <p>Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulpu</p>
                        <div class="position-relative w-100 mt-3">
                            <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Your Email" style="height: 48px;">
                            <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i class="fa fa-paper-plane text-primary-gradient fs-4"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container px-lg-5">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.

							<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
							Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                            </br>
                            Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <!-- Footer End -->



    <!-- JavaScript Libraries -->
    <script src="js/jquery-3.6.1.min.js"></script>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

<button onClick="reply_click(this.id)" id="3">SEND</button>

        <!-- Template Javascript -->
        <script src="/js/main.js"></script>
</body>
</html>
