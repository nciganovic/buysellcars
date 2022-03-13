@extends('layouts.layout-main')
@section('title')
    Ad - Admin Page
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <h1 class="text-center">Ad</h1>
        </div>
        <div>
            <a class="btn btn-success" href="{{ route("get_create_admin_ad") }}">Create</a>
        </div>
        <div class="col-12">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">User</th>
                    <th scope="col">Date Posted</th>
                    <th scope="col">Date Expires</th>
                    <th scope="col">City</th>
                    <th scope="col">Street</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($rows as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->date_posted }}</td>
                        <td>{{ $row->date_expires }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->street }}</td>
                        <td class="d-flex">
                            <div class="me-3">
                                <a class="btn btn-warning" href="{{ route("get_edit_admin_ad", ["id" => $row->id]) }}">Update</a>
                            </div>
                            <form action="{{ route("delete_admin_ad", ["id" => $row->id]) }}" method="POST">
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