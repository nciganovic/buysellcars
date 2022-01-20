@extends('layouts.layout-main')
@section('title')
    Socail Media - Admin Page
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <h1 class="text-center">Social media</h1>
        </div>
        <div class="col-12">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Url</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                    <tr>
                        <td>{{ $d->id }}</td>
                        <td>{{ $d->name }}</td>
                        <td>{{ $d->url }}</td>
                        <td>{{ $d->logo }}</td>
                        <td>
                            <a class="btn btn-warning" href="#">Update</a>
                            <a class="btn btn-danger" href="#">Delete</a>
                        </td>
                    </tr>   
                    @endforeach
                  
                </tbody>
              </table>
        </div>
    </div>
</div>    
    
@endsection
@section('scripts')
   
@endsection