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



function loadMore(clicked_id){

    $.ajax({
        url: "galeria",
        method: 'get',
        dataType: 'json',
        data: {'id':id, 'page':page}
    }).done(function (data){
        return data;
    });
}

