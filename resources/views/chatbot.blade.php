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
<body style="background:#1f3646;">

    <div>
        <div class="container-fluid m-0 d-flex p-2">
            <div class="pl-2" style="width:40px;height:50px;font-size:180%;">
                <i class="fa fa-angle-double-left text-white mt-2"></i>
            </div>
            <div style="width:50px;height:50px;">
                <img src="img/user.png" style="width:100%;height:100%;border-radius:50px;">
            </div>
            <div class="text-white font-weight-bold ml-2 mt-2" style="font-weight: bolder;font-size:22px;margin:5px;">
                SynoptiXpress chatbot
            </div>
        </div>
        <div style="border: #061128;height:2px;"></div>
        <div id="content-box" class="container-fluid p-2" style="height:calc(100vh-130px);overFlow-y:scroll;">
            
            
        </div>
        <div class="container-fluid w-100 px-3 py-2 d-flex" style="background: #131f45;height:62px;width:100%;">
            <div class="mr-2 pl-2" style="background:#ffffff1c;width:calc(100%-45px);border-radius:5px;">
                <input class="p-4 text-white" id="input" type="text" name="input" style="background:none;height:100%;border:0;outline:none;"/>
            </div>
            <div id="button-submit" class="text-center" style="cursor:pointer;background:#ffe165;height:100%;width:50px;border-radius:5px;">
                <i class="fa fa-paper-plane text-white" aria-hidden="true" style="line-height:45px;"></i>
            </div>
        </div>
    </div>

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