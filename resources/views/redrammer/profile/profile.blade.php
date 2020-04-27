@extends('layouts.home_layout.app')
@section('title')
Redrammer:Edit Profile
@endsection
@section('content')
<div class="container-fluid">

            <!-- cover photo -->
            <img src="
			  @if(!Auth()->user()->bgimage)
				{{asset('public')}}/bg/redrammer.jpg
				  @else 
				  {{asset('public/storage')}}/{{Auth()->user()->bgimage}}
				@endif" class="w-100 profile border" style="height: 1.5in;">

            <!-- profile image -->
            <img src="
				@if(!Auth()->user()->image)
				{{asset('public')}}/img/profile.png
				  @else 
				       {{asset('public/storage')}}/{{Auth()->user()->image}}
				@endif" class="profile rounded-circle position-relative border" style="height: 1in;
                width: 1in;bottom: 1em;"> 
        <div class="media">
            <div class="media-body">
                <h4 class="text-break text-capitalize">

                    <!-- full name -->
                    {{Auth()->user()->name}}

                    <!-- verification badge -->
                                            @if(auth()->user()->vip==1)
                                            <img src="{{asset('public/img/redmark.png')}}" width="25" height="20" class="verification-badge">
                                            @endif
                </h4>
                
                <!-- about -->
                <p class="text-muted">{{Auth()->user()->bio}}</p>
            </div>			  			  
        </div>			
        <hr>
        <div class="row text-center">
            <div class="col-4">
                <!-- post -->
                <h5> {{Auth()->user()->post->count()}} </h5>
            </div>
            <div class="col-4">
                <!-- follower -->
                <h5><a href="{{route('follower')}}" class="text-reset text-decoration-none">
                {{Auth()->user()->follower->count()}}
                
               
            </a></h5>
            </div>
            <div class="col-4">
                <!-- following -->
                <h5><a href="{{route('following')}}" 
                class="text-reset text-decoration-none"> {{Auth()->user()->follows->count()}}</a></h5>					
            </div>
            <div class="text-muted col-4">
                post
            </div>
            <div class="text-muted col-4">
                follower
            </div>
            <div class="text-muted col-4">
                following
            </div>				
        </div>
        <hr>
        <!-- card -->  
        @foreach($posts->all() as $post)
        <div class="card mb-5">
            <!-- card header -->
            <div class="card-header bg-white">
            <!-- media object -->					            
                <div class="media">
                    <!-- profile image -->
                    <img src="{{asset('public')}}/{{Auth()->user()->image}}" class="rounded-circle border profile" style="width: 0.7in;
                    height: 0.7in;">
                    <!-- media body -->
                    <div class="media-body mt-2 pl-2">
                        <a href="#" class="text-reset text-decoration-none">
                            <h5 class="text-capitalize  text-break">

                                <!-- full nmae -->
                                {{Auth()->user()->name}}
                        
                                <!-- verification badge -->
                                @if(Auth()->user()->vip==1)
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
                    <form action="{{route('profile.destroy',$post->id)}}" method="POST">
                        @csrf
                        @method('delete')
                    <button type="submit" class="bg-white border-0"
                    style="outline: none;" title="delete post"><i class="fas fa-trash hover pointer"></i></button>
                    </form>
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

                <!-- like button -->			    
                <button type="button" class="border-0 bg-white hover" style="outline: none;">
                    <!-- like icon -->
                    <i class="fas fa-heart text-danger" style="font-size: 0.3in;"></i>
                </button>

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
        
</div>




@endsection