@extends('backend/master')
@section('title', 'Tambah')
@section('state', '/ Kas Masuk / Tambah')
@section('content')

<head>

    <!-- load jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- provide the csrf token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <script>
        $(document).ready(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $(".postbutton").click(function(){
                $.ajax({
                    /* the route pointing to the post function */
                    url: '/dashboard/postajax',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, awal:$(".getinfo").val(), akhir:$(".getinfo1").val()},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        //$(".writeinfo").append(data.msg); 
                        alert(data.msg);
                    }
                }); 
            });
       });    
    </script>

</head>

<body>
    <input class="getinfo"></input>
     <input class="getinfo1"></input>
    <button class="postbutton">Post ajax!</button>
    <div class="writeinfo"></div>   
</body>
@endsection