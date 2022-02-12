@extends('layouts.layout-main')
@section('title')
    Register to Buy&Sell Cars
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <h1 class="text-center">Register</h1>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-8">
                <form method="POST" enctype="multipart/form-data" action="{{ route("post_register") }}">
                    @csrf

                    <div class="form-group mt-3">    
                        <label for="first_name">First Name</label>
                        <input class="form-control" id="first_name" name="first_name" type="text" value="{{ old('first_name') }}" class="@error('first_name') is-invalid @enderror">
                        @error('first_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">    
                        <label for="last_name">Last Name</label>
                        <input class="form-control" id="last_name" name="last_name" type="text" value="{{ old('last_name') }}" class="@error('last_name') is-invalid @enderror">
                        @error('last_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">    
                        <label for="email">Email</label>
                        <input class="form-control" id="email" name="email" type="email" value="{{ old('email') }}" class="@error('email') is-invalid @enderror">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">    
                        <label for="phone_number">Phone number</label>
                        <input class="form-control" id="phone_number" name="phone_number" type="tel" value="{{ old('phone_number') }}" class="@error('phone_number') is-invalid @enderror">
                        @error('phone_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">    
                        <label for="password">Password</label>
                        <input class="form-control" id="password" name="password" type="password" value="{{ old('password') }}" class="@error('password') is-invalid @enderror">
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group mt-3">    
                        <label for="password_confirmation">Repeat Password</label>
                        <input class="form-control" id="password_confirmation" name="password_confirmation" type="password" value="{{ old('password_confirmation') }}" class="@error('password_confirmation') is-invalid @enderror">
                        @error('password_confirmation')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="mt-3 btn btn-success" type="submit">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>    
@endsection