@extends('layouts.home_layout.app')
@section('title')
Redrammer:Edit Profile
@endsection
@section('content')
	<div class="container-fluid">
		<form action="{{route('edit_profile.update',Auth()->id())}}" method="POST" enctype="multipart/form-data">
				@csrf 
				@method('patch')
				<input type="file" name="bgimage" id="bgImage" class="position-absolute invisible">

				<!-- cover photo -->
				<img src="
				@if(!Auth()->user()->bgimage)
					{{asset('public')}}/bg/redrammer.jpg
					@else 
					{{asset('public/storage')}}/{{Auth()->user()->bgimage}}
					@endif 
				" class="w-100 profile border" style="height: 1.5in;"
				onclick="document.getElementById('bgImage').click()">
				
				<input type="file" name="image" id="Image" class="position-absolute invisible">
				<!-- profile image -->
				<img src="
					@if(!Auth()->user()->image)
					{{asset('public')}}/img/profile.png
					@else 
						{{asset('public/storage')}}/{{Auth()->user()->image}}
					@endif
						" class="profile rounded-circle position-relative border" 
				style="bottom: 1em;height: 1in;width: 1in;"onclick="document.getElementById('Image').click()">
				
					<div class="form-group">
						<label for="name">Full name</label>

						<!-- full name -->
						<input type="text" name="name" class="form-control" value="{{Auth()->user()->name}}" required="">
					</div>
					<div class="form-group">	
						<label for="bio">Bio</label>

						<!-- bio -->
						<textarea class="form-control"  name="bio">{{Auth()->user()->bio}}</textarea>
					</div>
					<div class="form-group">	    
						<label for="email">Email</label>

						<!-- email -->
						<input type="email" name="email" class="form-control" value="{{Auth()->user()->email}}">
					</div>    
					<div class="form-group">	    
						<label for="gender">Gender</label>
						<select class="form-control" name="gender">

							<!-- gender -->
							<option  value="select"  {{ (Auth()->user()->gender=="")? "selected" : "" }} >Select Gender</option>
							<option  value="male"    {{ (Auth()->user()->gender=="male")? "selected" : "" }} >Male</option>
							<option  value="female"  {{ (Auth()->user()->gender=="female")? "selected" : "" }} >Female</option>
							<option  value="other"   {{ (Auth()->user()->gender=="other")? "selected" : "" }} >Other</option>

						</select>
					</div>    
					<div class="form-group">
						<div class="form-check">
						<input class="form-check-input"  type="checkbox" id="gridCheck"  name="private"
							{{ (  Auth()->user()->private=="1")? "checked" : "" }}   >
						<label class="form-check-label" for="gridCheck">
							Private Account
						</label>
						</div>
					</div>

					<!-- save button -->
					<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
@endsection