<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Centro de Recreação Play</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- SEO -->
    @foreach ($about as $seo)
        <meta content="{{$seo->keywords}}" name="keywords">
        <meta content="{{$seo->title}}" name="description">
        <link rel="icon" type="imagem/png" href="media\about\{{$seo->favicon}}"/>
    @endforeach
    <meta name="robots" content="index, follow">

    <!-- Libraries Stylesheet -->
    <link href="/lib/animate/animate.min.css" rel="stylesheet">
    <link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/fontawesome-free-6.2.0-web/css/all.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="css/labs.css" rel="stylesheet">
    <link href="css/masonry.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- Gallery potoswipe -->
    <link rel="stylesheet" href="dist\photoswipe.css">
</head>
<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="51">
    <div class="container-xxl bg-white p-0">

        <!-- Navbar & Hero Start -->
     <!-- Navbar & Hero Start -->
            <div class="container-xxl position-relative p-0" id="home">
                <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                    @foreach ($about as $seo)
                    <a href="/" class="navbar-brand p-0">
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
            </div>
            <!-- Navbar & Hero End -->
            <section id="control" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                            <div class="carousel-item active" style="background-image:url('media/slider/{{$main_slide->slide}}');">
                            </div>
                    @foreach ($slider as $slide)
                    <div class="carousel-item" loading="lazy" style="background-image:url('media/slider/{{$slide->slide}}');">
                        @isset($slide->text)
                        <div class="centered-text-slder">
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

    <!-- Modal -->
    <div class="modal fade" id="modalNos" tabindex="-1" aria-labelledby="modalNos" aria-hidden="true">
    <div class="modal-lg modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title text-primary" id="exampleModalLabel">Sobre Nós</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @foreach ($us as $p)
                @if ($p->id % 2 == 0)
                <div class="row">
                  <div class="col-sm">
                    <img src="media/us/{{$p->picture}}" alt="centro play de recreação">
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
                    <img loading="lazy" src="media/us/{{$p->picture}}" alt="centro play de recreação">
                  </div>
                  </div>
                @endif
            @endforeach
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
                                        <img src="media/courses/cover_images/{{$course->cover_image}}" class="card-img-top " alt="imagem curso">
                                            <div class="card-body">
                                                <h5 class="card-title">{{$course->title}}</h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
                <!-- Modal -->
                @foreach ($courses as $i =>  $course)
                    <section class="modal fade" id="course{{$course->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-xl modal-dialog">
                            <div class="modal-content rounded">
                                <div class="modal-header">
                                    <h2 class="modal-title text-primary" id="exampleModalLabel">{{$course->title}}</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-sm">
                                                            <img loading="lazy" style="width: 100%" src="media/courses/cover_images/{{$course->cover_image}}" alt="">
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
                <input type="hidden" name="sub_catid" value="" id="sub_catid">
                    <div id="gallery-{{$course->id}}" class="wow fadeInUp" data-wow-delay="{{ $i / 10 }}s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                        <a onClick="gallery_id({{$course->id}}, '{{$course->title}}')">
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

    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h2 class="mb-5 text-primary-gradient">Equipe</h2>
        </div>
        <div class="integration-list row justify-content-center py-5">
            @foreach ($team  as $i =>  $person)
            <div class="item col-4 col-md-3 col-lg-2 mb-3 mb-lg-5 wow fadeInUp" data-wow-delay="{{ $i / 14 }}s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;" ><img loading="lazy" class="shadow rounded-circle" src="media/team/{{$person->picture}}" alt="Equipe Play"><p>{{$person->name}}</p></div>
            @endforeach
        </div>
    </div>
    <!-- Footer Start -->
        @foreach ($about as $info)
    <div class="text-center container wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
    <div class="d-flex bg-primary rounded-pill  bg-gradient">
        <a class="btn rounded-pill btn-outline-light btn-social" href="http://www.facebook.com/{{$info->facebook}}"><i class="fab fa-facebook-f"></i></a>
        <a class="btn rounded-pill btn-outline-light btn-social" href="http://instagram.com/_u/{{$info->instagram}}"><i class="fab fa-instagram"></i></a>
        <a class="btn rounded-pill btn-outline-light btn-social" href="https://wa.me/5545{{$info->whatsapp}}"><i class="fab fa-whatsapp"></i></a>
        <a class="btn rounded-pill btn-outline-light btn-social" href="tel:+5545{{$info->phone}}"><i class="fa fa-phone-alt me-3"></i></a>
        <a class="btn rounded-pill btn-outline-light btn-social" href="mailto:{{$info->email}}"><i class="fa fa-envelope me-3"></i></a>
    </div>
    </div>
        <div id="contato" class="container-fluid bg-primary mt-1 text-light footer wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5 px-lg-5"><h2 class="text-white mb-4">Informações</h2>
                <div class="row g-5">
                    <div class="col-md-6 col-lg-3">

                            <a style="color:white" href="https://wa.me/5545{{$info->whatsapp}}">
                                <p><i class="fab fa-whatsapp me-3"> </i>(45) {{$info->whatsapp}}</p>
                            </a>
                            <a style="color:white" href="http://instagram.com/_u/{{$info->instagram}}">
                                <p><i class="fab fa-instagram me-3"> </i> {{$info->instagram}}</p>
                            </a>
                            <a style="color:white" href="http://www.facebook.com/{{$info->facebook}}">
                                <p><i class="fab fa-facebook-f me-3"> </i> {{$info->facebook}}</p>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div>
                                <a style="color:white" href="https://www.google.com.br/maps/place/{{$info->address}}">
                                    <p><i class="fa fa-map-marker-alt me-3"> </i> {!!$info->address!!}</p>
                                </a>
                            </div>
                            <a style="color:white" href="tel:+5545{{$info->phone}}">
                                <p><i class="fa fa-phone-alt me-3"> </i> (45) {{$info->phone}}</p>
                            </a>
                        <a style="color:white" href="mailto:{{$info->email}}">
                            <p><i class="fa fa-envelope me-3"> </i> {{$info->email}}</p>
                        </a>
                    </div>
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                <br>
                <br>
                <br>
                &copy; <a class="border-bottom" href="#">Centro de Recreação Play</a>, 2023.

                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                Template Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                </br>
                Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>
            </div>
        </div>
    </div>
    @endforeach
    </div>
    </div>
    <!-- Footer End -->
    <style>.cookieConsentContainer{z-index:999;width:350px;min-height:20px;box-sizing:border-box;padding:30px 30px 30px 30px;background:#232323;overflow:hidden;position:fixed;bottom:30px;right:30px;display:none}.cookieConsentContainer .cookieTitle a{font-family:OpenSans,arial,sans-serif;color:#fff;font-size:22px;line-height:20px;display:block}.cookieConsentContainer .cookieDesc p{margin:0;padding:0;font-family:OpenSans,arial,sans-serif;color:#fff;font-size:13px;line-height:20px;display:block;margin-top:10px}.cookieConsentContainer .cookieDesc a{font-family:OpenSans,arial,sans-serif;color:#fff;text-decoration:underline}.cookieConsentContainer .cookieButton a{display:inline-block;font-family:OpenSans,arial,sans-serif;color:#fff;font-size:14px;font-weight:700;margin-top:14px;background:#000;box-sizing:border-box;padding:15px 24px;text-align:center;transition:background .3s}.cookieConsentContainer .cookieButton a:hover{cursor:pointer;background:#3e9b67}@media (max-width:980px){.cookieConsentContainer{bottom:0!important;left:0!important;width:100%!important}}</style>
    <script>var purecookieTitle="Cookies.",purecookieDesc="Este site usa cookies exclusivamente para melhorar a funcionalidade e a navegação. Não coletamos informações pessoais através de cookies. Ao continuar a navegar neste site, você concorda com o uso de cookies. Para mais informações, consulte nossa política de privacidade.",purecookieLink='',purecookieButton="Aceitar";function pureFadeIn(e,o){var i=document.getElementById(e);i.style.opacity=0,i.style.display=o||"block",function e(){var o=parseFloat(i.style.opacity);(o+=.02)>1||(i.style.opacity=o,requestAnimationFrame(e))}()}function pureFadeOut(e){var o=document.getElementById(e);o.style.opacity=1,function e(){(o.style.opacity-=.02)<0?o.style.display="none":requestAnimationFrame(e)}()}function setCookie(e,o,i){var t="";if(i){var n=new Date;n.setTime(n.getTime()+24*i*60*60*1e3),t="; expires="+n.toUTCString()}document.cookie=e+"="+(o||"")+t+"; path=/"}function getCookie(e){for(var o=e+"=",i=document.cookie.split(";"),t=0;t<i.length;t++){for(var n=i[t];" "==n.charAt(0);)n=n.substring(1,n.length);if(0==n.indexOf(o))return n.substring(o.length,n.length)}return null}function eraseCookie(e){document.cookie=e+"=; Max-Age=-99999999;"}function cookieConsent(){getCookie("purecookieDismiss")||(document.body.innerHTML+='<div class="cookieConsentContainer" id="cookieConsentContainer"><div class="cookieTitle"><a>'+purecookieTitle+'</a></div><div class="cookieDesc"><p>'+purecookieDesc+" "+purecookieLink+'</p></div><div class="cookieButton"><a onClick="purecookieDismiss();">'+purecookieButton+"</a></div></div>",pureFadeIn("cookieConsentContainer"))}function purecookieDismiss(){setCookie("purecookieDismiss","1",1),pureFadeOut("cookieConsentContainer")}window.onload=function(){cookieConsent()};</script>

    <!-- JavaScript Libraries -->
    <script src="js\jquery-3.6.1.min.js"></script>
    <script src="js\bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js\main.js"></script>
    <script>new WOW().init(); </script>
<script type="module">
import PhotoSwipeLightbox from '{{ URL::asset("dist/photoswipe-lightbox.esm.min.js") }}';
import PhotoSwipeFullscreen from '{{ URL::asset("dist/photoswipe-fullscreen.esm.min.js") }}';
$( document ).ready(function() {
window.gallery_id = gallery_id;
function gallery_id(id, title){
const lightbox = new PhotoSwipeLightbox({
  dataSource: [
    { src:  'media/courses/pictures/next.gif', width: 800, height: 500},
    { src: 'https://dummyimage.com/1500x1000/555/fff/?text='+title, width: 800, height: 500},
],
  pswpModule: () => import('{{ URL::asset("dist/photoswipe.esm.min.js") }}')
});
const fullscreenPlugin = new PhotoSwipeFullscreen(lightbox);
let page = 0;
lightbox.on('change', () => {
    var button = document.querySelector('.pswp__buttonextn').click();
});
lightbox.on('uiRegister', () => {
  const { pswp }  = lightbox;
  let replacedCount = 0;
  let addedCount = 1;
  pswp.ui.registerElement({
    name: 'addSlide',
    className: 'pswp__buttonextn',
    isButton: true,
    onClick: (event, el) => {
    addedCount++;
    page ++;
    $.ajax({
        url: "galeria",
        method: 'get',
        dataType: 'json',
        data: {'id':id, 'page':page},
        success: function(data) {
            data.map(function(item) {
                lightbox.options.dataSource.push(item);
            });
            pswp.updateSize(true);
        console.log(pswp.options.dataSource)
        }});
      pswp.refreshSlideContent(pswp.getNumItems() - 1);
    }});
});
lightbox.init();
document.querySelector('#gallery-'+id).onclick = () => {
console.log(id);
lightbox.loadAndOpen(0);
};
}});
</script>
</body>
</html>
