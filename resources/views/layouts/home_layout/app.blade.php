<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="icon" href="{{asset('public/img/redrammer.jpg')}}" type="image/jpeg">
        <link rel="stylesheet" type="text/css" href="{{asset('public/css/custom_css/custom_framework.css')}}">
		<title>@yield('title')

		</title>
		@yield('css')
		<style type="text/css">
			#more{
				display: none;
			}
		</style>
	</head>
	<body>
		<!-- container -->
        <div class="container-fluid">
			
        	<!-- nav bar -->
        	<div class="custom-nav d-flex justify-content-between ">
	    		<div ><a href="{{route('home')}}" style="{{Request::is('home')?'color: black':''}};"><i class="fas fa-home" title="Home"></i></a></div>
	            <div ><a href="{{route('explore')}}" style="{{Request::is('explore')?'color: black':''}};"><i class="fas fa-search" title="People"></i></a></div>
	    		<div ><a href="{{route('chat')}}" style="{{Request::is('chat')?'color: black':''}};"><i class="fas fa-comment-dots" title="Message"></i></a></div>
	    		<div ><a href="{{route('notification')}}" style="{{Request::is('notification')?'color: black':''}};"><i class="fas fa-bell" title="Notification"></i></a></div>  
	    		<div ><a href="{{route('setting')}}" style="{{Request::is('setting')?'color: black':''}};"><i class="fas fa-cog" title="Setting"></i></a></div>
			</div>
		</div>
            <hr >
			             @if(session('error'))
                           <div class="alert alert-danger">{{session('error')}}
                             </div>
                       @endif
            <!-- card -->
			@yield('content')
		
			
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/a6f50dbc66.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="{{asset('public/js/home.js')}}"></script>
		<script type="text/javascript">
        	function myFunction() {
			  var dots = document.getElementById("dots");
			  var moreText = document.getElementById("more");

			  if (dots.style.display === "none") {
			    dots.style.display = "inline";
			    moreText.style.display = "none";
			  } else {
			    dots.style.display = "none";
			    moreText.style.display = "inline";
			  }
			}
		</script>
		<script src="http://unpkg.com/turbolinkspe"></script>
		@yield('script')
	</body>
</html>