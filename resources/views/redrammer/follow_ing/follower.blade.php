@extends('layouts.home_layout.app')
@section('title')
Redrammer:Follower
@endsection
@section('content')
<div class="container-fluid mt-3">
	@foreach($users as $user)
			<div class="media">
				<img src="{{asset('/public')}}/{{$user->image}}" class="rounded-circle border profile" style="width: 0.7in;
				height: 0.7in;">
				<div class="media-body pl-2 pt-4">
					<span class="text-capitalize text-break">{{$user->name}}</span>
				</div>
				<button class="btn btn-primary border-radius-2 position-relative" style="top: 0.1in;">Follower</button>
			</div>
			<hr>

		</div>
	@endforeach
@endsection