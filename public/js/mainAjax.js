(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();


    // Initiate the wowjs
    new WOW().init();


    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 45) {
            $('.navbar').addClass('sticky-top shadow-sm');
        } else {
            $('.navbar').removeClass('sticky-top shadow-sm');
        }
    });


    // Smooth scrolling on the navbar links
    $(".navbar-nav a").on('click', function (event) {
        if (this.hash !== "") {
            event.preventDefault();

            $('html, body').animate({
                scrollTop: $(this.hash).offset().top - 45
            }, 1500, 'easeInOutExpo');

            if ($(this).parents('.navbar-nav').length) {
                $('.navbar-nav .active').removeClass('active');
                $(this).closest('a').addClass('active');
            }
        }
    });


    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    // Screenshot carousel
    $(".screenshot-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        loop: true,
        dots: true,
        items: 1
    });


    

})(jQuery);













//Ajax
var dataLeng = 1;
var page = parseInt(0);
var id = parseInt(0);
var preLoaded = [];

function resetDataCounter(){
    dataLeng = 1;
    page = 0;
}

function reply_click(clicked_id){
    id = clicked_id;
    page ++;

    if(preLoaded.indexOf(id) === -1)
    {

    if(dataLeng > 0){
        loadMore();
    }else{
        preLoaded.push(id);
    }
    }
}


if(data.length == 0)
{
    alert('stop');
}
function loadMore(clicked_id){

    $.ajax({
        url: "galeria",
        method: 'get',
        dataType: 'json',
        data: {'id':id, 'page':page}
    }).done(function (data){
    dataLeng = data.length;

    $(document).ready(function () {

      });
        if (data.length > 0) {
            var html = ""
            //loop
            $(data).each(function(i, v) {
              //generate htmls//
              html += ` <div class="carousel-item">
              <img class='img-size' src='media/courses/pictures/${v.filename}' alt='Second slide' />
          </div>`
            })




            //insert new html after last slide
            $(html).insertAfter('#carousel-'+id+' .carousel-item:last')
          }
    });
}


/*
btn.addEventListener('click', function(){

    console.log(1);
});
*/

/*
function loadPictures(page, id) {
    $.ajax({
        url: "{{route('galeria.loadPictures')}}",
        method: 'POST',
        "_token": "{{ csrf_token() }}",
        data: {'page':page, 'id':id},
        dataType: 'JSON'
    }).done(function (res){
        alert(res);
    });
}
*/
