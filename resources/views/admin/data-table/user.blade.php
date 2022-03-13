@extends('layouts.layout-main')
@section('title')
    User - Admin Page
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <h1 class="text-center">User</h1>
        </div>
        <div>
            <a class="btn btn-success" href="{{ route("get_create_admin_user") }}">Create</a>
        </div>
        <div class="col-12">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone number</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                    <tr>
                        <td>{{ $d->id }}</td>
                        <td>{{ $d->first_name }}</td>
                        <td>{{ $d->last_name }}</td>
                        <td>{{ $d->email }}</td>
                        <td>{{ $d->phone_number }}</td>
                        <td class="d-flex">
                            <div class="me-3">
                                <a class="btn btn-warning" href="{{ route("get_edit_admin_user", ["id" => $d->id]) }}">Update</a>
                            </div>
                            <form action="{{ route("delete_admin_user", ["id" => $d->id]) }}" method="POST">
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