@extends('layouts.home_layout.app')
@section('title')
Redrammer:Following
@endsection
@section('content')
<div class="container-fluid">
            <div class="border px-4 py-5 shadow mt-2">
                <h1 class="text-center py-4">{{Auth()->user()->name}}</h1>
                @foreach ($errors->all() as $error)
                            <p class="text-danger">{{ $error }}</p>
                         @endforeach
                <form method="POST" action="{{ route('password.store') }}">
                        @csrf  
                    
                     <div class="form-group">

                              <!-- Current password -->
                            <input type="password"
                             class="form-control border-radius-2" name="current_password" 
                            placeholder="Current password" required>
                    </div>
                    
                    <div class="form-group">

                        <!-- password -->
                        <input type="password" class="form-control border-radius-2" name="new_password" 
                        placeholder="New password" required>
                    </div>
                    <div class="form-group">

                        <!-- confirm password -->
                        <input type="password" class="form-control border-radius-2" name="new_confirm_password" 
                        placeholder="Confirm password" required>
                    </div>

                    <!-- change password button -->
                	<button class="btn btn-primary btn-block border-radius-2 text-uppercase" type="submit">
                        update password
                    </button>
                </form>                       
            </div>
        </div>

@endsection