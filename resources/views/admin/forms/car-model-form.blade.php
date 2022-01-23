@extends('layouts.layout-main')
@section('title')
   Create Car Model - Admin Page
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <h1 class="text-center">{{ $action }} Car Model</h1>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-8">
                <form method="POST" 
                    @if($action == "Create")
                        action="{{ route("post_create_admin_car_model") }}"
                    @else 
                        action="{{ route("post_edit_admin_car_model", $model->id) }}"
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
                        <label for="brand_id">Brand</label>
                        <select name="brand_id" class="form-select" aria-label="Default select example">
                            <option value="">Select brand</option>
                            @foreach ($brands as $b)
                                @if(old('brand_id') != null)
                                    <option @if($b->id == old('brand_id')) selected @endif  value="{{ $b->id }}">{{ $b->name }}</option>     
                                @else
                                    <option @if($b->id == $model->brand_id) selected @endif  value="{{ $b->id }}">{{ $b->name }}</option> 
                                @endif
                            @endforeach
                        </select>
                        @error('brand_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="car_body_id">Car Body</label>
                        <select name="car_body_id" class="form-select" aria-label="Default select example">
                            <option value="">Select car body</option>
                            @foreach ($car_bodies as $c)
                                @if(old('car_body_id') != null)
                                    <option @if($c->id == old('car_body_id')) selected @endif value="{{ $c->id }}">{{ $c->name }}</option>
                                @else 
                                    <option @if($c->id == $model->car_body_id)) selected @endif value="{{ $c->id }}">{{ $c->name }}</option>
                                @endif               
                            @endforeach
                        </select>
                        @error('car_body_id')
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