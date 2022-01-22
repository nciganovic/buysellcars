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
                <a href="{{ route("get_admin_social_media") }}" class="list-group-item list-group-item-action">
                  Social Medias
                </a>
                <a href="{{ route("get_admin_city") }}" class="list-group-item list-group-item-action">
                    City
                </a>
            </div>
        </div>
    </div>
</div>    
    
@endsection
@section('scripts')
    <script src="{{ asset('js/index.js') }}"></script>
@endsection