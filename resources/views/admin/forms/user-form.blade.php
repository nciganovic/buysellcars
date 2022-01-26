@extends('layouts.layout-main')
@section('title')
   Create User - Admin Page
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <h1 class="text-center">{{ $action }} User</h1>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-8">
                <form method="POST" 
                    @if($action == "Create")
                        action="{{ route("post_create_admin_user") }}"
                    @else 
                        action="{{ route("post_edit_admin_user", $model->id) }}"
                    @endif>
                    @csrf

                    <input type="hidden" name="id" value="{{ $model->id }}" />

                    <div class="form-group mt-3">    
                        <label for="first_name">First name</label>
                        <input class="form-control" id="first_name" name="first_name" type="text" value="{{ old('first_name', $model->first_name) }}" class="@error('first_name') is-invalid @enderror">
                        @error('first_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">    
                        <label for="last_name">Last name</label>
                        <input class="form-control" id="last_name" name="last_name" type="text" value="{{ old('last_name', $model->last_name) }}" class="@error('last_name') is-invalid @enderror">
                        @error('last_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">    
                        <label for="email">Email</label>
                        <input class="form-control" id="email" name="email" type="email" value="{{ old('email', $model->email) }}" class="@error('email') is-invalid @enderror">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">    
                        <label for="phone_number">Phone number</label>
                        <input class="form-control" id="phone_number" name="phone_number" type="text" value="{{ old('phone_number', $model->phone_number) }}" class="@error('phone_number') is-invalid @enderror">
                        @error('phone_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="" name="is_admin[]" value="1" id="is_admin" @if(old('is_admin') != null || $model->is_admin == 1) checked @endif>
                        <label class="form-check-label" for="is_admin">
                          Is Admin
                        </label>
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