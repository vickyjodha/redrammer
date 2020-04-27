
@extends('layouts.home_layout.app')
@section('title')
Redrammer:Notifaction
@endsection
@section('content')
<div class="container-fluid">
			<div class="media">				
				<span class="badge badge-danger badge-pill position-absolute"> 10 </span>
				<a href="approve_request.htm">
					<img src="img/ravi.jpeg" class="rounded-circle border profile" style="width: 0.7in;
				height: 0.7in;">
				</a>
				<div class="media-body mx-2 mt-2">
					<h5>Follow Requests</h5>
					<P class="text-muted">Approve or ingnore requests</P>
				</div>				
			</div>
			<hr>
			<div class="media">
				<a href="sent_request.htm">
					<img src="img/logo.png" class="rounded-circle border profile" style="width: 0.7in;
				height: 0.7in;">
				</a>
				<div class="media-body mx-2 mt-2">
					<h5>Friend Requests Sent</h5>
					<P class="text-muted">View Sent Requests</P>
				</div>				
			</div>
			<hr>
			<div class="media">
				<img src="img/redrammer.jpg" class="rounded-circle border profile" style="width: 0.7in;
				height: 0.7in;">
				<div class="media-body mx-2 mt-3">
					<span class="text-capitalize text-break">Redrammer <img src="img/redmark.png" 
					class="verification-badge"></span> 
					<span class="font-weight-light">liked your post.</span> 
					<span class="text-muted">4 d</span> 
				</div>
				<img src="img/kapil.jpg" class="border profile position-relative" style="width: 0.5in;
				height: 0.5in;top: 0.1in;">
			</div>
			<hr>
			<div class="media">
				<img src="img/kapil.jpg" class="rounded-circle border profile" style="width: 0.7in;
				height: 0.7in;">
				<div class="media-body mx-2 mt-2">
					<span class="text-capitalize text-break">Kapil Sharma</span><br> 
					<span class="font-weight-light">started following you.</span> 
					<span class="text-muted">1 w</span> 
				</div>
				<button class="btn btn-primary border-radius-2 position-relative" style="top: 0.1in;">Follow</button>
			</div>
			<hr>
			<div class="media">
				<img src="img/redrammer.jpg" class="rounded-circle border profile" style="width: 0.7in;
				height: 0.7in;">
				<div class="media-body mx-2 mt-3">
					<span class="text-capitalize text-break">Redrammer <img src="img/redmark.png" 
					class="verification-badge"></span> 
					<span class="font-weight-light">left a message on your post: <b>special title</b></span> 
					<span class="text-muted">4 d</span> 
				</div>
			</div>
			<hr>
</div>
@endsection