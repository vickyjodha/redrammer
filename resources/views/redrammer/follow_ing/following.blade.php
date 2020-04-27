@extends('layouts.home_layout.app')
@section('title')
Redrammer:Following
@endsection
@section('content')
	<div class="container-fluid mt-3">
		@foreach(Auth()->user()->follows as $user)
					<div class="media">
						<img src="{{asset('/public')}}/{{$user->image}}" class="rounded-circle border profile" style="width: 0.7in;
						height: 0.7in;">
						<div class="media-body pl-2 pt-4">
							<span class="text-capitalize text-break">{{$user->name}}</span>
						</div>
						<form action="{{route('follow.store',$user->id)}}" method="POST">
                      @csrf
                      <button type="submit" class="btn btn-light border-radius-2 position-relative" style="top: 0.1in;">
                      {{Auth()->user()->following($user)?'Following':' UnFollow Me'}} 
                      </button>
                </form>
						
					</div>
					<hr>
		@endforeach
	</div>

@endsection