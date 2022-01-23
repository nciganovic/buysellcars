@extends('layouts.layout-main')
@section('title')
    Car Model - Admin Page
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <h1 class="text-center">Car Model</h1>
        </div>
        <div class="col-12">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Car Body</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($rows as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->brand->name }}</td>
                        <td>{{ $row->car_body->name }}</td>
                        <td class="d-flex">
                            <div class="me-3">
                                <a class="btn btn-warning" href="{{ route("get_edit_admin_car_model", ["id" => $row->id]) }}">Update</a>
                            </div>
                            <form action="{{ route("delete_admin_car_model", ["id" => $row->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button id="remove-item-btn" onclick="return confirm('Do you really want to delete?')" class="btn btn-danger" title="Delete">Delete</button>
                            </form>
                        </td>
                    </tr>   
                    @endforeach
                  
                </tbody>
              </table>
            <div>
                <a class="btn btn-success" href="{{ route("get_create_admin_car_model") }}">Create</a>
            </div>
        </div>
    </div>
</div>    
    
@endsection