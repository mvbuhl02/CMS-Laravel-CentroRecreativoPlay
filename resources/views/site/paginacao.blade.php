<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax</title>
</head>
<body>

retorno
    <form id="form">
        <input type="hidden" id="page" name="page" value="0">
    </form>

    <div id="card-reader">

    </div>
    <script
    src="https://code.jquery.com/jquery-3.6.1.js"
    integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function(){
            loadPictures(0);
        })
        $(document).on('click', '#paginacao a', function(e){
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            loadPictures(page);
        })
        function loadPictures(page){
            $('#page').val(page);
            var dados = $('#form').serialize();
            $.ajax({
                url: "galeria",
                method: 'GET',
                data: dados
            }).done(function (data){
                $('#card-reader').html(data);
            });
        }
    </script>
</body>
</html>
