@extends('layouts.home_layout.app')
@section('title')
Redrammer:Chat
@endsection
@section('content')

<input type="text" placeholder="Search people for message" class="search form-control my-2">
            <!-- media tag -->   
            <div class="media">
                <div class="media-left">

                  <!-- profile image -->
                  <img src="{{asset('public/img/redrammer.jpg')}}" class="media-object rounded-circle border object-fit-cover" 
                  style="width: 0.7in;height: 0.7in;">
                </div>
                <!-- media body -->
                <div class="media-body mt-2 pl-2">
                  <a href="#" class="text-reset text-decoration-none">
                    <h5 class="media-heading text-capitalize text-break">

                        <!-- full name -->
                        redrammer

                        <!-- verification badge -->
                        <img src="{{asset('public/img/redmark.png')}}" width="25" height="20" class="verification-badge">
                    </h5>

                    <!-- message thumbnail -->
                    <p class="text-muted">
                    	Hii 

	              		<!-- active dot -->
                    	<span class="d-inline-block bg-success border-radius-2" style="width: 0.7em;height: 0.7em;">
	                	</span>
	              	</p>	              	
                  </a>
                </div>
            </div>
            <hr>
            <!-- media tag -->   
            <div class="media">
                <div class="media-left">

                  <!-- profile image -->
                  <img src="{{asset('public/img/ravi.jpeg')}}" class="media-object rounded-circle border object-fit-cover" 
                  style="width: 0.7in;height: 0.7in;">
                </div>
                <!-- media body -->
                <div class="media-body mt-2 pl-2">
                  <a href="#" class="text-reset text-decoration-none">
                    <h5 class="media-heading text-capitalize text-break">

                        <!-- full name -->
                        ravi junval

                        <!-- verification badge -->
                        <img src="{{asset('public/img/redmark.png')}}" width="25" height="20" class="verification-badge">
                    </h5>

                    <!-- status -->
                    <p class="text-muted">You sent a message</p>
                  </a>
                </div>
            </div>
            <hr>
            <!-- media tag -->   
            <div class="media">
                <div class="media-left">

                  <!-- profile image -->
                  <img src="{{asset('public/img/ravi.jpeg')}}" class="media-object rounded-circle border object-fit-cover" 
                  style="width: 0.7in;height: 0.7in;">                  
                </div>
                <!-- media body -->
                <div class="media-body mt-2 pl-2">
                  <a href="#" class="text-reset text-decoration-none">
                    <h5 class="media-heading text-capitalize text-break">

                        <!-- full name -->
                        kapil sharma
                    </h5>

                    <!-- status -->
                    <p class="text-muted">Sent you a message</p>
                  </a>
                </div>
            </div>
            <hr>  			

@endsection                 