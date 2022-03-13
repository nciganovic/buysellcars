@extends('layouts.layout-main')
@section('title')
    Welcome to Buy&Sell Cars
@endsection
@section('content')
<div class="container">
    @include("main.partial.filters")
    <div class="row d-flex justify-content-between">   
        @foreach ($ads as $ad)
            @include('partial.ad-card')
        @endforeach
        @if(count($ads) == 0)
            <p class="text-center mt-5 font-l">No ad matches current criteria.</p>
        @endif
    </div>
    @include("main.partial.pager")
</div>    
@endsection
@section('scripts')
    <script src="{{ asset('js/index.js') }}"></script>
@endsection