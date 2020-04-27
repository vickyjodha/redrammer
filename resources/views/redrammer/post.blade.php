@extends('layouts.home_layout.app')
@section('title')
Redrammer:Post
@endsection
@section('css')
	


@if(session('error'))
                           <div class="alert alert-danger">{{session('error')}}
                             </div>
                       @endif

<link rel="stylesheet" type="text/css" href="{{asset('public/css/trix.css')}}">
<style>
span.trix-button-group.trix-button-group--file-tools {
    display: none;
}
</style>
@endsection
@section('content')
<div class="container-fluid mt-2">
	<form action="{{route('post.store')}}"  method="POST" enctype="multipart/form-data" >
				@csrf
				
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" id="title" name="title" value="{{old('title')}}" class="form-control @error('title') is-invalid @enderror" placeholder="title">
					@error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
				</div>
					
				<div class="form-group">

				<label for="content">Content</label>
				<input id="content" type="hidden" name="content" class=" @error('name') is-invalid @enderror" value="{{old('content')}}">
				<trix-editor  input="content"></trix-editor>
				</div>
					<button type="submit" name="submit" value="submit" class="btn btn-primary">Post</button>
					<input type="file" name="image"  value="{{old('image')}}" id="myInput" class="position-absolute invisible">
					<i class="far fa-file-image pl-3 cursor-pointer" style="font-size: 1.5em;" 
					onclick="document.getElementById('myInput').click()"></i>
	</form>
</div>	




@endsection                 
@section('script')
<script type="text/javascript" src="{{asset('public/css/trix.js')}}"></script>
@endsection