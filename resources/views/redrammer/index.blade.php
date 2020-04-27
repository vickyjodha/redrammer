@extends('layouts.home_layout.app')
@section('title')
Redrammer:Home
@endsection
@section('content')

<div class="container-fluid mb-5">
			<!-- card -->
		@foreach($posts as $post)
			<div class="card mb-1">
				<!-- card header -->
				<div class="card-header bg-white">
				<!-- media object -->					            
					<div class="media">
					  	<!-- profile image -->
					    <img src="@if(!$post->user->image)
					{{asset('public')}}/img/profile.png
					@else 
						{{asset('public/storage')}}/{{$post->user->image}}
					@endif" class="rounded-circle border profile" style="width: 0.7in;
					    height: 0.7in;">
					  	<!-- media body -->
					  	<div class="media-body mt-2 pl-2">
						    <a href="#" class="text-reset text-decoration-none">
						    	<h5 class="text-capitalize  text-break">

				                    <!-- full nmae -->
							      	{{$post->user->name}}
				               
									<!-- verification badge -->
									@if($post->user->vip==1)
				                         <img src="{{asset('public/img/redmark.png')}}" class="verification-badge">
							        @endif
								</h5>

							    <!-- time to post -->
							    <p class="text-muted">
								{{$post->created_at->diffForHumans()}}
							    	<span class="d-inline-block bg-success border-radius-2" 
							    	style="width: 0.7em;height: 0.7em;">   		
							    	</span>
							    </p>
						    </a>
					  	</div>
				  	</div>
				</div>
				<!-- card body -->			
			    <div class="card-body">

			    	<!-- post image -->
			    	<img class="card-img-top" src="{{asset('/public/storage')}}/{{$post->image}}">

			    	<!-- post title -->			    	
			    	<h5 class="card-title mt-3 mb-1">{{$post->title}}</h5>

			    	<!-- post text -->
    				<p class="card-text">
					{!!$post->content!!}
    					<span onclick="myFunction()" id="dots" class="cursor-pointer text-muted">...more</span> 
    					<span id="more">
    						 as a natural lead-in to additional content.as a natural lead-in to additional content.as a natural lead-in to additional content.as a natural lead-in to additional content.as a natural lead-in to additional content.as a natural lead-in to additional content.as a natural lead-in to additional content.as a natural lead-in to additional content.as a natural lead-in to additional content.
    					</span>
    				</p>
				</div>
				<!-- card footer -->
				<div class="card-footer px-3 bg-white">	
				       <form action="{{route('like.store',$post->id)}}" method="POST">
                               @csrf
								<!-- like button -->			    
								<button type="submit"  class="border-0 bg-white hover" style="outline: none;">
									<!-- like icon -->
									
									@if($post->likes)
									<i class="fas fa-hear text-danger " style="font-size:0.3in;"></i>
									
									 @else
									
									 <i class="fas fa-heart text-secondary " style="font-size:0.3in;"></i>
									@endif 
									{{$post->likes->count()?:0}}
								
									
									
								</button>
                        </form>
			    	<!-- chat page link -->
			    	<a href="#" class="text-reset">
			    		<i class="far fa-comments pl-2" style="font-size: 0.3in;"></i>
			    	</a>

			    	<!-- liked people page link -->			
				    <a href="#" class="text-reset text-decoration-none d-block">
				    	Liked by <span class="font-weight-bold">kapil sharma</span> and	
				    	<span class="font-weight-bold">others.</span>
				    </a>				
				</div>
			</div>
        @endforeach
			<div class="position-fixed bg-white border-radius-2" style="right: 1em;bottom: 1em;">
				<a href="{{route('post.create',Auth()->user()->id)}}"><img src="{{asset('public/img/post.png')}}" style="width: 2.1em;height: 2.1em;"></a>
				
			</div>
</div>	
		            
@endsection                 