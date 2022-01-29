@extends('layouts.layout-main')
@section('title')
    Cars - Admin Page
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <h1 class="text-center">Cars</h1>
        </div>
        <div class="col-12">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Model</th>
                    <th scope="col">Year</th>
                    <th scope="col">Km</th>
                    <th scope="col">Engine cubic capactity</th>
                    <th scope="col">Engine power</th>
                    <th scope="col">Color</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($rows as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->car_model->brand->name }}</td>
                        <td>{{ $row->car_model->name }}</td>
                        <td>{{ $row->year }}</td>
                        <td>{{ $row->km }}</td>
                        <td>{{ $row->engine_cubic_capacity }}</td>
                        <td>{{ $row->engine_power }}</td>
                        <td>{{ $row->color }}</td>
                        <td class="d-flex">
                            <div class="me-3">
                                <a class="btn btn-warning" href="{{ route("get_edit_admin_car", ["id" => $row->id]) }}">Update</a>
                            </div>
                            <form action="{{ route("delete_admin_car", ["id" => $row->id]) }}" method="POST">
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
                <a class="btn btn-success" href="{{ route("get_create_admin_car") }}">Create</a>
            </div>
        </div>
    </div>
</div>    
    
@endsection