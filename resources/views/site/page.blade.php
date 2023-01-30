<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<button onclick="clicked_id()">carrega</button>




<script
  src="https://code.jquery.com/jquery-3.6.1.min.js"
  integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
  crossorigin="anonymous"></script>
<script>
var page = 1;
var id = 1;
function reply_click(clicked_id){
    id = clicked_id;
    loadMore();
}

function loadMore(clicked_id){


    $.ajax({
        url: "galeria",
        method: 'get',
        dataType: "xml",
        data: {'id':id, 'page':page}
    }).done(function (data){
        console.log(data);
        $('.card').html(data);
    });

}

</script>
</body>
</html>
