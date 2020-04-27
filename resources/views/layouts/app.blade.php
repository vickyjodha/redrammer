<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Redrammer') }}</title>

    <!-- Scripts -->
  

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('public/bootstrap/css/mdb.min.css')}}">
        <link rel="icon" href="{{asset('public/img/redrammer.jpg')}}" type="image/jpeg">
        <link rel="stylesheet" type="text/css" href="{{asset('public/css/custom_css/custom_framework.css')}}">

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
   
</head>
<body>

<div class="container-fluid">
            <div class="text-center bg-danger text-light p-1">
              <h2>redrammer</h2>
            </div>  
              @yield('content')
             <br>
            <div class="d-flex justify-content-around">
                <div><a href="#">Help center</a></div>
                <div><a href="#">About</a></div>
            </div>
            <div class="d-flex justify-content-around">
                <div><a href="#">Data policy</a></div>
                <div><a href="#">Privacy</a></div>
            </div>            
            <div class="d-flex justify-content-around">
                <div><a href="#">Terms</a></div>
                <div><a href="#">Cookies policy</a></div>
            </div>
            <br>
            <div class="text-center">
                <p class="text-muted">redrammer &copy; 2020</p>
            </div>
</div> 
   











    <script src="https://js.pusher.com/5.1/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   
    
@auth
    <script>
     var receiver_id='';
     var my_id="{{Auth()->user()->id}}";
     $(document).ready(function(){
                                    $.ajaxSetup({
                                        headers:{
                                            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                                        }
                                    });
         Pusher.logToConsole = true;

    var pusher = new Pusher('1ec5a0628ddfc7884980', {
      cluster: 'ap2',
      forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
     // alert(JSON.stringify(data));
      if(my_id==data.from){
        $('#'+ data.to).click();
       
      }else if(my_id==data.to){
          if(receiver_id==data.from){
              // if receiver is selected , reload the selected user ...
             $('#'+ data.from).click();
          }else{
               //if receiver is not selected , add  notification for that user

               var pending=parseInt( $('#'+ data.from).find('.pending').html());
               if(pending){
                $('#'+ data.from).find('.pending').html(pending+1);
               }else{
                $('#'+ data.from).append('<span class="pending">1</span>');
               }
          }
      }
    });
         $('.user').click(function(){
             $('.user').removeClass('active');
             $(this).addClass('active');
             $(this).find('.pending').remove();

             receiver_id=$(this).attr('id');
             $.ajax({
                 type:"get",
                 url:"message/" + receiver_id,
                 data:"",
                 cache:false,
                 success:function(data){
                     $('#messages').html(data);
                     scrollToBottomFunc();
                 }
            });
         });

         $(document).on('keyup','.input-text input',function(e){
             var message=$(this).val();
             if(e.keyCode==13 && message !='' && receiver_id !=''){
                 $(this).val('');

                 var datastr="receiver_id=" + receiver_id + "&message=" +message;
                 $.ajax({
                     type:"post",
                     url:"message",
                     data:datastr,
                     cache:false,
                     success:function(data){},
                     error:function (jqXHR, status,err){},
                     complete:function (){
                        scrollToBottomFunc();
                     }
                 });
             }
         });
     });
     // make a function to scroll down auto 

     function scrollToBottomFunc(){
         $('.message-wrapper').animate({
             scrollTop: $('.message-wrapper').get(0).scrollHeight
         },50);
     }

    </script>
@endauth

<script src="{{asset('public/css/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/bootstrap/js/jquery-3.4.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/bootstrap/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/bootstrap/js/mdb.min.js')}}"></script> 
</body>
</html>
