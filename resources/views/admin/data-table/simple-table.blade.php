@extends('layouts.layout-main')
@section('title')
    Data - Admin Page
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <h1 class="text-center">{{ ucwords(str_replace("_", " ", $table)) }}</h1>
        </div>
        <div>
            <a class="btn btn-success" href="{{ route("get_create_admin_simple_table", ["table" => $table]) }}">Create</a>
        </div>
        <div class="col-12">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($model as $d)
                    <tr>
                        <td>{{ $d->id }}</td>
                        <td>{{ $d->name }}</td>
                        <td class="d-flex">
                            <div class="me-3">
                                <a class="btn btn-warning" href="{{ route("get_edit_admin_simple_table", ["id" => $d->id, "table" => $table]) }}">Update</a>
                            </div>
                            <form action="{{ route("delete_admin_simple_table", ["id" => $d->id, "table" => $table]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button id="remove-item-btn" onclick="return confirm('Do you really want to delete?')" class="btn btn-danger" title="Delete">Delete</button>
                            </form>
                        </td>
                    </tr>   
                    @endforeach
                  
                </tbody>
              </table>
        </div>
    </div>
</div>    
    
@endsection