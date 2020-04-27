@extends('layouts.home_layout.app')
@section('title')
Redrammer:Explore
@endsection
@section('content')
            <form   action="" method="GET">

               <input type="text" name="search"
                value="{{request()->query('search')}}"
                 placeholder="Search people for follow"
                  class="search form-control my-2">
            </form>

           
            @forelse($users as $user)
             <!-- media tag -->   
            <div class="media">
                <div class="media-left">

                  <!-- profile image -->
                  <img src="@if(!Auth()->user()->image)
					{{asset('public')}}/img/profile.png
					@else 
						{{asset('public/storage')}}/{{Auth()->user()->image}}
					@endif" class="media-object rounded-circle border object-fit-cover" 
                  style="width: 0.7in;height: 0.7in;">
                </div>
                <!-- media body -->
                <div class="media-body mt-2 pl-2">
                  <a href="#" class="text-reset text-decoration-none">
                    <h5 class="media-heading text-capitalize text-break">

                        <!-- full name -->
                        {{$user->name}}
                        

                        @if($user->vip==1)
                           <img src="{{asset('public/img/redmark.png')}}" width="25" height="20" class="verification-badge">
                         @endif
                    </h5>

                    <!-- status -->
                    <p class="text-muted">Suggested for you</p>
                  </a>
                </div>
                <form action="{{route('follow.store',$user->id)}}" method="POST">
                      @csrf
                      <button type="submit" class="btn btn-light border-radius-2 position-relative" style="top: 0.3in;">
                      {{Auth()->user()->following($user)?'UnFollow Me':'Follow me'}} 
                      </button>
                </form>
            </div>
            <hr> 
            @empty
       <p class="text-center">No  Found Result  for Query <strong>{{request()->query('search')}}</strong>
       </p>
    @endforelse
@endsection                 