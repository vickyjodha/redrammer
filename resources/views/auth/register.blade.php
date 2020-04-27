@extends('layouts.app')

@section('content')

<div class="border px-4 py-5 shadow">             
                <br>
                <form  action=" {{ route('register') }}" method="POST">
                    @csrf
                    <div class="form-group">

                        <!-- full name -->
                        <input type="text" class="form-control @error('name') is-invalid @enderror border-radius-2"
                         name="name" value="{{old('name')}}" autocomplete="name" placeholder="Full name" >
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">

                        <!-- phone number -->
                        <input type="text" class="form-control border-radius-2
                          @error('phone') is-invalid @enderror" name="phone"
                          placeholder="Phone number"
                          value="{{old('phone')}}"
                          autocomplete='phone'
                         >
                         @error('phone')
                         <span class="invalid-feedback" role="alert">
                             <strong>{{$message}}</strong>
                         </span>
                         @enderror
                    </div>
                    <div class="form-group">

                        <!--  email -->
                        <input type="email" class="form-control border-radius-2
                          @error('email') is-invalid @enderror" name="email"
                          placeholder="Please insert Email "
                          value="{{old('email')}}"
                          autocomplete='email'
                         >
                         @error('email')
                         <span class="invalid-feedback" role="alert">
                             <strong>{{$message}}</strong>
                         </span>
                         @enderror
                    </div>
                    <div class="form-group">

                        <!-- password -->
                        <input type="password" class="form-control border-radius-2
                        @error('password') is-invalid @enderror
                        " name="password" autocomplete="password"
                        value="{{old('password')}}"
                        placeholder="Password" >
                          @error('password') 
                          <span class="invalid-feedback"nrole="alert">
                              <strong>{{$message}}</strong>
                          </span>
                          @enderror
                    </div>
                    <div class="form-group">
                    
                        <!-- password -->
                        <input type="password" class="form-control border-radius-2" name="password_confirmation" autocomplete="new-password" placeholder="Password" >
                    </div>
                    <!-- login button -->
                    <button class="btn btn-primary btn-block border-radius-2" type="submit">
                         {{ __('Signup') }}
                    </button>
                </form>
                <br>
                <p>
                    By signing up, you agree to our<a href="#" class="text-muted text-decoration-none"> Terms</a>, 
                    <a href="#" class="text-muted text-decoration-none">Data Policy</a> and <a href="#" 
                    class="text-muted text-decoration-none">Cookies Policy</a>.
                </p>                       
            </div>
            <br>
            <div class="text-center">

            <!-- login page redirecting button -->    
            <a href="{{ route('login') }}" role="button" class="btn btn-success">you already registered</a>
            </div>
      
@endsection
