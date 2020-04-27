@extends('layouts.home_layout.app')
@section('title')
Redrammer:setting
@endsection

@section('content')
<div class="container-fluid">	
			<div class="media">
		    	<a href="{{route('profile')}}" class="text-reset text-decoration-none">
				<img src="
					@if(!Auth()->user()->image)
					{{asset('public')}}/img/profile.png
					@else 
						{{asset('public/storage')}}/{{Auth()->user()->image}}
					@endif" class="rounded-circle profile border" 
		    	     style="width: 0.8in; height: 0.8in;">
					<div class="media-body pt-4 pl-2 d-inline">
						<h5 class="text-capitalize text-break d-inline ">
							{{Auth()->user()->name}}
							@if(auth()->user()->vip==1)
                           <img src="{{asset('public/img/redmark.png')}}" width="25" height="20" class="verification-badge">
                         @endif
							
						</h5>			    
					</div>
				 </a> 			  
			</div>
			<br>
			<ul class="list-group list-group-flush">
				<a href="{{route('edit_profile.index')}}"class="list-group-item text-decoration-none text-reset"> Edit Profile </a>
				<a href="{{route('privacy')}}" class="list-group-item text-decoration-none text-reset"> Privacy Policy </a>
				<a href="{{route('password')}}" class="list-group-item text-decoration-none text-reset"> Change Password </a>		
				<a href="{{route('help')}}" class="list-group-item text-decoration-none text-reset"> Help Center </a>
				<a href="{{route('about')}}" class="list-group-item text-decoration-none text-reset"> About </a>
				<a href="{{route('data')}}" class="list-group-item text-decoration-none text-reset"> Data Policy </a>				
				<a href="{{route('terms')}}" class="list-group-item text-decoration-none text-reset"> Terms </a>
				<!-- <a href="#" class="list-group-item text-danger text-decoration-none">
					<i class="fas fa-power-off"></i> Logout 
                </a> -->
                <form  action="{{ route('logout') }}" method="POST" >
                                        @csrf
                                        <button class="list-group-item"  type="submit" style=" border:none" >
					<i class="fas fa-power-off mr-2 text-danger"></i> 
					<span class="text-danger">logout</span>
					
                </button>
										
            </form>	
            </ul>	
           	              
        </div>
@endsection                 