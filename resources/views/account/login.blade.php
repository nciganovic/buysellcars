@extends('layouts.layout-main')
@section('title')
    Login to Buy&Sell Cars
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <h1 class="text-center">Login</h1>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-8">
                <form method="POST" enctype="multipart/form-data" action="{{ route("post_login") }}">
                    @csrf

                    <div class="form-group mt-3">    
                        <label for="email">Email</label>
                        <input class="form-control" id="email" name="email" type="email" value="{{ old('email') }}" class="@error('email') is-invalid @enderror">
                        @error('email')
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

                    <div class="form-check mt-3">
                        <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me">
                        <label class="form-check-label" for="remember_me">Remember me</label>
                    </div>
                    
                    <button class="mt-3 btn btn-success" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>    
@endsection