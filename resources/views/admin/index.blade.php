@extends('layouts.layout-main')
@section('title')
    Admin page for Bug&Sell Cars
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <h1 class="text-center">Admin page</h1>
        </div>
        <div class="col-12 mt-3">
            <div class="list-group">
                <a href="{{ route("get_admin_ad") }}" class="list-group-item list-group-item-action">
                    Ads
                </a>
                <a href="{{ route("get_admin_car") }}" class="list-group-item list-group-item-action">
                    Cars
                </a>
                <a href="{{ route("get_admin_user") }}" class="list-group-item list-group-item-action">
                    Users
                </a>
                <a href="{{ route("get_admin_car_model") }}" class="list-group-item list-group-item-action">
                    Models
                </a>
                <a href="{{ route("get_admin_social_media") }}" class="list-group-item list-group-item-action">
                    Social Medias
                </a>
                @foreach ($tables as $table)
                    <a href="{{ route("get_admin_simple_table", ["table" => $table]) }}" class="list-group-item list-group-item-action">
                        {{ ucwords(str_replace("_", " ", $table)) }}
                    </a>
                @endforeach
            </div>
        </div>
        <div class="col-12 mt-3">
            <h2 class="text-center">Track</h2>
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">User</th>
                    <th scope="col">Url</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody id="t-body" data-page="1">
                    @foreach ($trackers as $t)
                    <tr>
                        <td>@if($t->email == null) Anonymous @else {{ $t->email }} @endif</td>
                        <td>{{ $t->url }}</td>
                        <td>{{ $t->datetime }}</td>
                    </tr>   
                    @endforeach
                </tbody>
              </table>
              @if($next)
              <div class="d-flex justify-content-center">
                  <button class="btn btn-success me-1 track-move-left" disabled="disabled"><</button>
                  <button class="btn btn-success ms-1 track-move-right">></button>
              </div>
              @endif
        </div>
    </div>
</div>    
    
@endsection
@section('scripts')
    <script src="{{ asset('js/admin/index-admin.js') }}"></script>
@endsection