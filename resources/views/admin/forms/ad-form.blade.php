@extends('layouts.layout-main')
@section('title')
   Create Ad - Admin Page
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <h1 class="text-center">{{ $action }} Car </h1>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-8">
                <form method="POST" enctype="multipart/form-data"
                    @if($action == "Create")
                        action="{{ route("post_create_admin_car") }}"
                    @else 
                        action="{{ route("post_edit_admin_car", $model->id) }}"
                    @endif>
                    @csrf

                    <div class="form-group mt-3">    
                        <label for="name">Year</label>
                        <input class="form-control" id="year" name="year" type="text" value="{{ old('year', $model->year) }}" class="@error('year') is-invalid @enderror">
                        @error('year')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">    
                        <label for="name">Kilometers</label>
                        <input class="form-control" id="km" name="km" type="text" value="{{ old('km', $model->km) }}" class="@error('km') is-invalid @enderror">
                        @error('km')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">    
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" type="text" class="@error('description') is-invalid @enderror">
                            {{ old('description', $model->description) }}
                        </textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">    
                        <label for="engine_cubic_capacity">Engine cubic capacity</label>
                        <input class="form-control" id="engine_cubic_capacity" name="engine_cubic_capacity" type="number" value="{{ old('engine_cubic_capacity', $model->engine_cubic_capacity) }}" class="@error('engine_cubic_capacity') is-invalid @enderror">
                        @error('engine_cubic_capacity')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">    
                        <label for="engine_power">Engine power</label>
                        <input class="form-control" id="engine_power" name="engine_power" type="number" value="{{ old('engine_power', $model->engine_power) }}" class="@error('engine_power') is-invalid @enderror">
                        @error('engine_power')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">    
                        <label for="color">Color</label>
                        <input class="form-control" id="color" name="color" type="text" value="{{ old('color', $model->color) }}" class="@error('color') is-invalid @enderror">
                        @error('color')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" value="" name="is_automatic[]" value="1" id="is_automatic" @if(old('is_automatic') != null || $model->is_automatic == 1) checked @endif>
                        <label class="form-check-label" for="is_automatic">
                          Is Automatic
                        </label>
                    </div>

                    <div class="form-group mt-3">    
                        <label for="gear_number">Gear Number</label>
                        <input class="form-control" id="gear_number" name="gear_number" type="number" value="{{ old('gear_number', $model->gear_number) }}" class="@error('gear_number') is-invalid @enderror">
                        @error('gear_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">    
                        <label for="door_number">Door Number</label>
                        <input class="form-control" id="door_number" name="door_number" type="number" value="{{ old('door_number', $model->door_number) }}" class="@error('door_number') is-invalid @enderror">
                        @error('door_number')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="car_model_id">Car Model</label>
                        <select name="car_model_id" class="form-select" aria-label="Default select example">
                            <option value="">Select car model</option>
                            @foreach ($car_models as $cm)
                                @if(old('car_model_id') != null)
                                    <option @if($cm->id == old('car_model_id')) selected @endif  value="{{ $cm->id }}">{{ $cm->brand->name }} - {{ $cm->name }}</option>     
                                @else
                                    <option @if($cm->id == $model->car_model_id) selected @endif  value="{{ $cm->id }}">{{ $cm->brand->name }} - {{ $cm->name }}</option> 
                                @endif
                            @endforeach
                        </select>
                        @error('car_model_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="user_id">User</label>
                        <select name="user_id" class="form-select" aria-label="Default select example">
                            <option value="">Select user</option>
                            @foreach ($users as $u)
                                @if(old('user_id') != null)
                                    <option @if($u->id == old('user_id')) selected @endif value="{{ $u->id }}">{{ $u->email }}</option>
                                @else 
                                    <option @if($u->id == $model->user_id) selected @endif value="{{ $u->id }}">{{ $u->email }}</option>
                                @endif               
                            @endforeach
                        </select>
                        @error('user_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="fuel_id">Fuel</label>
                        <select name="fuel_id" class="form-select" aria-label="Default select example">
                            <option value="">Select fuel</option>
                            @foreach ($fuels as $f)
                                @if(old('fuel_id') != null)
                                    <option @if($f->id == old('fuel_id')) selected @endif value="{{ $f->id }}">{{ $f->name }}</option>
                                @else 
                                    <option @if($f->id == $model->fuel_id) selected @endif value="{{ $f->id }}">{{ $f->name }}</option>
                                @endif               
                            @endforeach
                        </select>
                        @error('fuel_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="engine_emission_id">Engine emission</label>
                        <select name="engine_emission_id" class="form-select" aria-label="Default select example">
                            <option value="">Select engine emission</option>
                            @foreach ($engine_emissions as $ee)
                                @if(old('engine_emission_id') != null)
                                    <option @if($ee->id == old('engine_emission_id')) selected @endif value="{{ $ee->id }}">{{ $ee->name }}</option>
                                @else 
                                    <option @if($ee->id == $model->engine_emission_id) selected @endif value="{{ $ee->id }}">{{ $ee->name }}</option>
                                @endif               
                            @endforeach
                        </select>
                        @error('engine_emission_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">    
                        <label for="images">Add new image</label>
                        <input class="form-control" id="images" name="images" type="file" class="@error('images') is-invalid @enderror">
                        @error('images')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    @if($action == "Create")
                    <button class="mt-3 btn btn-success" type="submit">Create</button>
                    @else
                    <button class="mt-3 btn btn-warning" type="submit">Update</button>
                    @endif
                </form>

                @if($action == "Edit")
                    <div id="carouselExampleControls" class="carousel slide mt-3" data-bs-ride="carousel">
                        <div class="carousel-inner">
                        @foreach($images as $img)
                            <div class="carousel-item @if ($loop->first) active @endif">
                                <img src="{{ $img->src }}" class="d-block w-100" alt="...">
                            </div>
                        @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>    
@endsection