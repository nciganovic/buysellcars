@extends('layouts.layout-main')
@section('title')
   Create Ad - Admin Page
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <h1 class="text-center">{{ $action }} Ad </h1>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-8">
                <form method="POST" enctype="multipart/form-data"
                    @if($action == "Create")
                        action="{{ route("post_create_admin_ad") }}"
                    @else 
                        action="{{ route("post_edit_admin_ad", $model->id) }}"
                    @endif>
                    @csrf

                    <div class="form-group mt-3">
                        <label for="car_id">Cars</label>
                        <select name="car_id" class="form-select" aria-label="Default select example">
                            <option value="">Select car</option>
                            @foreach ($cars as $c)
                                @if(old('car_id') != null)
                                    <option @if($c->id == old('car_id')) selected @endif value="{{ $c->id }}">{{ $c->email }} {{ $c->brand_name }} {{ $c->car_model_name }}</option>
                                @else 
                                    <option @if($c->id == $model->car_id) selected @endif value="{{ $c->id }}">{{ $c->email }} {{ $c->brand_name }} {{ $c->car_model_name }}</option>
                                @endif               
                            @endforeach
                        </select>
                        @error('car_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="city_id">City</label>
                        <select name="city_id" class="form-select" aria-label="Default select example">
                            <option value="">Select city</option>
                            @foreach ($cities as $c)
                                @if(old('city_id') != null)
                                    <option @if($c->id == old('city_id')) selected @endif value="{{ $c->id }}">{{ $c->name }}</option>
                                @else 
                                    <option @if($c->id == $model->city_id) selected @endif value="{{ $c->id }}">{{ $c->name }}</option>
                                @endif               
                            @endforeach
                        </select>
                        @error('city_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">    
                        <label for="street">Street</label>
                        <input class="form-control" id="street" name="street" type="text" value="{{ old('street', $model->street) }}" class="@error('street') is-invalid @enderror">
                        @error('street')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">    
                        <label for="price">Price</label>
                        <input class="form-control" id="price" name="price" type="number" value="{{ old('price', $model->price) }}" class="@error('price') is-invalid @enderror">
                        @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">    
                        <label for="sale">Sale</label>
                        <input class="form-control" id="sale" name="sale" type="number" value="{{ old('sale', $model->sale) }}" class="@error('sale') is-invalid @enderror">
                        @error('sale')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="" name="is_fixed_price[]" value="1" id="is_fixed_price" @if(old('is_fixed_price') != null || $model->is_fixed_price == 1) checked @endif>
                        <label class="form-check-label" for="is_fixed_price">
                          Is Fixed Price
                        </label>
                    </div>

                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="" name="is_special[]" value="1" id="is_special" @if(old('is_special') != null || $model->is_special == 1) checked @endif>
                        <label class="form-check-label" for="is_special">
                          Is Special
                        </label>
                    </div>

                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="" name="is_sold[]" value="1" id="is_sold" @if(old('is_sold') != null || $model->is_sold == 1) checked @endif>
                        <label class="form-check-label" for="is_sold">
                          Is Sold
                        </label>
                    </div>

                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="" name="is_active[]" value="1" id="is_active" @if(old('is_active') != null || $model->is_active == 1) checked @endif>
                        <label class="form-check-label" for="is_active">
                          Is Active
                        </label>
                    </div>

                    @if($action == "Create")
                    <button class="mt-3 btn btn-success" type="submit">Create</button>
                    @else
                    <button class="mt-3 btn btn-warning" type="submit">Update</button>
                    @endif
            </div>
        </div>
    </div>
</div>    
@endsection