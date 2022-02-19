@extends('layouts.layout-main')
@section('title')
    Car Brand Car Model - Year
@endsection
@section('content')
<div class="container w-75 mt-3">

    <div class="d-flex justify-content-between">
        <span class="font-l">{{ $ad->brand_name }} {{ $ad->car_model_name }} {{ $ad->year }}. year</span>
        <span>
            @if($ad->sale > 0)
            <span class="text-gray line-on-text">{{ number_format($ad->price, 0) }}&euro;</span>
            <span class="font-l sale-card ms-2">{{ $ad->sale }}&percnt;</span>
            <span class="font-l ms-2">{{ number_format((1 - $ad->sale / 100) * $ad->price, 0) }}&euro;</span>
            @else
            <span class="font-l ms-2">{{ number_format($ad->price, 0) }}$</span>
            @endif
        </span>
    </div>
    <div class="row d-flex justify-content-center">
        <div id="carouselExampleControls" class="carousel slide mt-3" data-bs-ride="carousel">
            <div class="carousel-inner">
            @foreach ($images as $image)
            <div class="carousel-item @if ($loop->first) active @endif">
                <img src="{{ $image->src }}" class="d-block w-100" alt="{{ $image->name }}">
            </div>
            @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="row">
        <div>
            @csrf
            <span id="fav-count" class="font-l">{{ $favorites_count }}</span>
            <a id="fav-click" class="text-dark" href="#" data-ad-id="{{ $ad->id }}"> <span id="fav-icon" class="fa @if($is_favorite)fa-heart @else fa-heart-o @endif ms-1 font-l"></span> </a>
        </div>
    </div>
    <div class="row">
        <h3 class="text-center mt-3">Info</h3>
        <div class="col-6 mt-3">
        <table class="table table-striped">
            <tbody>
              <tr>
                <td>Fixed price:</td>
                <td>{{ ($ad->is_fixed_price == 0) ? "No" : "Yes"  }} </td>
              </tr>
              <tr>
                <td>Date Posted: </td>
                <td>{{ $ad->date_posted }}</td>
              </tr>
              <tr>
                <td>Location:</td>
                <td>{{ $ad->street }}, {{ $ad->city }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-6 mt-3">
            <table class="table table-striped">
                <tbody>
                  <tr>
                    <td>Owner: </td>
                    <td>{{ $ad->first_name }} {{ $ad->last_name }}</td>
                  </tr>
                  <tr>
                    <td>Contact email:</td>
                    <td>{{ $ad->email }}</td>
                  </tr>
                  <tr>
                    <td>Phone number:</td>
                    <td>{{ $ad->phone_number }}</td>
                  </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <h3 class="text-center mt-3">Specifications</h3>
        <div class="col-6 mt-3">
        <table class="table table-striped">
            <tbody>
              <tr>
                <td>Kilometers:</td>
                <td>{{ number_format($ad->km, 0)  }}</td>
              </tr>
              <tr>
                <td>Engine cubic capacity: </td>
                <td>{{ $ad->engine_cubic_capacity }} cm&sup3;</td>
              </tr>
              <tr>
                <td>Engine power:</td>
                <td>{{ $ad->engine_power }} KS</td>
              </tr>
              <tr>
                <td>Car body type:</td>
                <td>{{ $ad->car_body_name }}</td>
              </tr>
              <tr>
                <td>Fuel name:</td>
                <td>{{ $ad->fuel_name }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-6 mt-3">
            <table class="table table-striped">
                <tbody>
                  <tr>
                    <td>Color: </td>
                    <td>{{ ucfirst($ad->color) }}</td>
                  </tr>
                  <tr>
                    <td>Is Automatic:</td>
                    <td>{{ ($ad->is_automatic == 0) ? "No" : "Yes" }}</td>
                  </tr>
                  <tr>
                    <td>Gear number:</td>
                    <td>{{ $ad->gear_number }}</td>
                  </tr>
                  <tr>
                    <td>Door number:</td>
                    <td>{{ $ad->door_number }}</td>
                  </tr>
                  <tr>
                    <td>Engine emission:</td>
                    <td>{{ $ad->ee_name }}</td>
                  </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <h3 class="text-center mt-3">Description</h3>
        <p>{{ $ad->description }}</p>
    </div>
</div>   
@endsection
@section('scripts')
    <script src="{{ asset('js/info.js') }}"></script>
@endsection