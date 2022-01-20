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
                    <th scope="col">#</th>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Url</th>
                    <th scope="col">Logo</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                  </tr>
                </tbody>
              </table>
        </div>
    </div>
</div>    
    
@endsection
@section('scripts')
   
@endsection