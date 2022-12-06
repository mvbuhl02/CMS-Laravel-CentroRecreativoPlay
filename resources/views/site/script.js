
var page = 1;
var id = 0;


function reply_click(clicked_id)
{

    id = clicked_id;

    alert('O id é: '+ id);
}


/*
btn.addEventListener('click', function(){

    console.log(1);
});
*/


function loadPictures() {
    $.ajax({
        url: '/galeria/loadPictures/',
        method: 'POST',
        data: {'page':page, 'id':id},
        dataType: 'JSON'
    }).done(function (res){
        console.log(res);
    });
}
