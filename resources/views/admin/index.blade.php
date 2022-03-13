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
        @include("admin.partial.admin-tables")
        <div class="col-12 mt-3">
            <h2 class="text-center">Track</h2>
            @include("admin.partial.track-table")
        </div>
    </div>
</div>    
@endsection
@section('scripts')
    <script src="{{ asset('js/admin/index-admin.js') }}"></script>
@endsection