@extends('layouts.layout-main')
@section('title')
    Car Brand Car Model - Year
@endsection
@section('content')
<div class="container">
    <h1 class="text-center mt-3">My Favorites</h1>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th scope="col">Brand</th>
                <th scope="col">Model</th>
                <th scope="col">Year</th>
                <th scope="col">Price</th>
                <th scope="col">User</th>
                <th scope="col">Ad Expiration</th>
                <th scope="col">Actions</th>
              </tr>
        </thead>
        <tbody>
        @if($favorites != null)
            @foreach ($favorites as $f)
              <tr>
                <td>{{ $f->brand_name }}</td>
                <td>{{ $f->car_model_name }}</td>
                <td>{{ $f->year }}</td>
                <td>{{ $f->price }} &euro;</td>
                <td>{{ $f->first_name }} {{ $f->last_name }}</td>
                <td>{{ $f->date_expires }}</td>
                <td class="d-flex">
                    <form action="{{ route("delete_admin_user", ["id" => $f->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button id="remove-item-btn" onclick="return confirm('Do you really want to remove from favorites?')" class="btn btn-danger" title="Delete">Delete</button>
                    </form>
                </td>
              </tr>
            @endforeach
        </tbody>
        @else
        @endif
    </table>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('js/favorites.js') }}"></script>
@endsection