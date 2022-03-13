@extends('layouts.layout-main')
@section('title')
    Car Brand Car Model - Year
@endsection
@section('content')
<div class="container">
    <h1 class="text-center mt-3">My ads</h1>

    @if(count($cars) == 0)
        <p class="text-center">You don't have any cars yet, click <a href="{{ route("get_create_user_car") }}">here</a> to add first one. Without any car you cannot create ad.</p>
    @else
        @if(count($ads) == 0)
        <p class="text-center">You don't have any ads yet, click <a href="{{ route("get_create_user_ad") }}">here</a> to create first one.</p>
        @else 
            <div class="d-flex justify-content-between">
            @foreach ($ads as $ad)
                @include('partial.ad-card', ["edit_link" => true])
            @endforeach
            </div>
        @endif
    @endif
</div>
@endsection