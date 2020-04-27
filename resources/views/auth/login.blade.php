@extends('layouts.app')

@section('content')
<div class="border px-4 py-5 shadow">
                <div class="text-center">

                <!-- profile image -->
                <img src="{{asset('public/img/ravi.jpeg')}}" class="rounded-circle img-thumbnail profile" style="width: 1in;height: 1in;">
                </div>
                <div class="media text-center">
                  <div class="media-body">
                    <h5 class="text-capitalize text-break">

                        <!-- full name -->
                        ravi junval

                        <!-- verification badge --> 
                        <img src="{{asset('public/img/redmark.png')}}" class="verification-badge">
                    </h5>
                  </div>
                </div>
                <br>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                       <input  type="email" class="form-control @error('email') is-invalid @enderror border-radius-2" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
                    </div>
                    <div class="form-group">

                        
                        <input type="password" class="form-control @error('password') is-invalid @enderror border-radius-2" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>

                    <!-- login button -->
                	<button class="btn btn-primary btn-block border-radius-2" type="submit">
                    {{ __('Login') }}
                    </button>
                </form>
                <br> 
                    @if (Route::has('password.request'))
                        <!-- forgotten password link -->
                        <a href="{{ route('password.request') }}" class="text-decoration-none text-dark">{{ __('Forgot Your Password?') }}</a>                       
                    @endif
            </div>
            <br>
            <div class="text-center">
                @if (Route::has('register'))
                    <!-- signup page redirecting button -->    
                    <a href="{{ route('register') }}" role="button" class="btn btn-success">Create new account</a>
                @endif
            </div>
            <br>
@endsection
