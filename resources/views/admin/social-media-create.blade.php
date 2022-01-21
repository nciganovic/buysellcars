@extends('layouts.layout-main')
@section('title')
   Create Socail Media - Admin Page
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <h1 class="text-center">Create Social Media</h1>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-8">
                <form method="POST" action="{{ route("post_create_admin_social_media") }}">
                    @csrf

                    <div class="form-group mt-3">    
                        <label for="name">Name</label>
                        <input class="form-control" id="name" name="name" type="text" class="@error('name') is-invalid @enderror">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">    
                        <label for="url">Url</label>
                        <input class="form-control" id="url" name="url" type="url" class="@error('url') is-invalid @enderror">
                        @error('url')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">    
                        <label for="logo">Logo</label>
                        <input class="form-control" id="logo" name="logo" type="text" class="@error('logo') is-invalid @enderror">
                        @error('logo')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="mt-3 btn btn-success" type="submit">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>    
@endsection
@section('scripts')
   
@endsection