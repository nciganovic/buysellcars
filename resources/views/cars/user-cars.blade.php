@extends('layouts.layout-main')
@section('title')
    Welcome to Buy&Sell Cars
@endsection
@section('content')
<div class="container">
    <div class="row d-flex justify-content-between">   
        <h1 class="text-center">My Cars</h1>
        
        @if(count($cars) > 0)
        <div class="col-12">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Year</th>
                    <th scope="col">Km</th>
                    <th scope="col">Color</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($cars as $row)
                    <tr>
                        <td>{{ $row->brand_name }} {{ $row->car_model_name }}</td>
                        <td>{{ $row->year }}</td>
                        <td>{{ $row->km }}</td>
                        <td>{{ $row->color }}</td>
                        <td class="d-flex">
                            <div class="me-3">
                                <a class="btn btn-warning" href="{{ route("get_edit_car", ["id" => $row->id]) }}">Update</a>
                            </div>
                            <form action="{{ route("delete_car", ["id" => $row->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button id="remove-item-btn" onclick="return confirm('Do you really want to delete?')" class="btn btn-danger" title="Delete">Delete</button>
                            </form>
                        </td>
                    </tr>   
                    @endforeach
                </tbody>
              </table>
              <div><a class="btn btn-success" href="{{ route("get_create_user_car") }}">Add New Car</a></div>
        </div>
        @else
            <p class="text-center">You don't have any cars yet, click <a href="{{ route("get_create_user_car") }}">here</a> to add first one.</p>
        @endif
    </div>
</div>    
@endsection
@section('scripts')
    <script src="{{ asset('js/user-cars.js') }}"></script>
@endsection