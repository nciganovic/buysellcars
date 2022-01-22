@extends('layouts.layout-main')
@section('title')
   Create simple_table - Admin Page
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <h1 class="text-center">{{ $action }} {{ ucwords(str_replace("_", " ", $table)) }} </h1>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-8">
                <form method="POST" 
                    @if($action == "Create")
                        action="{{ route("post_create_admin_simple_table", ["table" => $table]) }}"
                    @else 
                        @isset($model)
                            action="{{ route("post_edit_admin_simple_table", ["id" => $model->id, "table" => $table]) }}"
                        @endisset
                    @endif>
                    @csrf

                    <div class="form-group mt-3">    
                        <label for="name">Name</label>
                        <input class="form-control" id="name" name="name" type="text"  
                            @isset($model) 
                                value="{{ old('name', $model->name) }}" 
                            @else 
                                value="{{ old('name') }}" 
                            @endisset 
                        
                            class="@error('name') is-invalid @enderror">

                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">    
                        <label for="order">Order</label>
                        <input class="form-control" id="order" name="order" type="number"  
                            @isset($model) 
                                value="{{ old('order', $model->order) }}" 
                            @else 
                                value="{{ old('order') }}" 
                            @endisset 
                        
                            class="@error('order') is-invalid @enderror">

                        @error('order')
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