<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    	<title>SynopticXpress - Synops control</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <link rel="icon" type="image/x-icon" href="img/logoWB.png" />
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    </head>
    <style>
    *{
        margin:0;
        padding:0;
        font-family: 'Times New Roman', Times, serif;
        font-size: 20px;
    }
    ::-webkit-scrollbar{
        width:5px;
    }
    ::-webkit-scrollbar-track{
        background:#13254c;
    }
    ::-webkit-scrollbar-thumb{
        background:#061128;
    }

    </style>
<body>
    <h1>Bot Laravel</h1>
    <form method="post" action="/send-message">
        @csrf
        <input type="text" name="message">
        <button type="submit">Envoyer</button>
    </form>
    @isset($botResponse)
        <p>Réponse du bot : {{ $botResponse }}</p>
    @endisset
</body>    
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    $('#button-submit').on('click',function(){
        $value=$('#input').val();
        $('#content-box').append(`
            <div class="mb-2">
                <div class="float-right px-3 py-2" style="width:270px;border-radius:10px;background:#ffe165;float:right;font-size:110%;padding:5px;">
                ${$value}
                </div>
                <div style="clear:both;">

                </div>
            </div>`);
            
            $.ajax({
                type: 'get',
                url: '{{url("send")}}',
                data:{
                    'input':$value
                },
                success: function(data){
                    $('#content-box').append(`
                    <div class="d-flex mb-2">
                        <div class="mr-2" style="width:45px;height:45px;">
                            <img src="img/user.png" style="width:100%;height:100%;border-radius:50px;">
                        </div>
                        <div class="text-white px-3 py-2" style="width:270px;background:#2f5169;border-radius:10px;font-size:100%;">
                            ${data}
                        </div>
                    </div>
                    `)
                    $value=$('#input').val('');
                }
            })
    })
</script>
</html>