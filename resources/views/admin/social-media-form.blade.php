@extends('layouts.layout-main')
@section('title')
   Create Socail Media - Admin Page
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <h1 class="text-center">{{ $action }} Social Media</h1>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-8">
                <form method="POST" 
                    @if($action == "Create")
                        action="{{ route("post_create_admin_social_media") }}"
                    @else 
                        action="{{ route("post_edit_admin_social_media", $model->id) }}"
                    @endif>
                    @csrf

                    <div class="form-group mt-3">    
                        <label for="name">Name</label>
                        <input class="form-control" id="name" name="name" type="text" value="{{ old('name', $model->name) }}" class="@error('name') is-invalid @enderror">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">    
                        <label for="url">Url</label>
                        <input class="form-control" id="url" name="url" type="text" value="{{ old('url', $model->url) }}" class="@error('url') is-invalid @enderror">
                        @error('url')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">    
                        <label for="logo">Logo</label>
                        <input class="form-control" id="logo" name="logo" type="text" value="{{ old('logo', $model->logo) }}" class="@error('logo') is-invalid @enderror">
                        @error('logo')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    @if($action == "Create")
                    <button class="mt-3 btn btn-success" type="submit">Create</button>
                    @else
                    <button class="mt-3 btn btn-warning" type="submit">Update</button>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>    
@endsection