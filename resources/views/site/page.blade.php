
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<script>



var page = 1;
var id = 0;
function reply_click(clicked_id){
    id = clicked_id;
    loadMore();
}

function loadMore(clicked_id){


    $.ajax({
        url: "galeria",
        method: 'post',
        dataType: "xml",
        data: {'id':id, 'page':page}
    }).done(function (data){
        $('.card').html(data);
    });

}

</script>
</body>
</html>
