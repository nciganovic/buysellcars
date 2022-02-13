@extends('layouts.layout-main')
@section('title')
    Buy&Sell Cars Profile
@endsection
@section('content')
    <h1 class="text-center">Profile</h1>
    <h2 class="text-center">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h2>
@endsection
@section('scripts')
    <script src="{{ asset('js/index.js') }}"></script>
@endsection