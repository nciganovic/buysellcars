@extends('layouts.layout-main')
@section('title')
    About me
@endsection
@section('content')
<div class="row">
<div class="col-12">
    <h1 class="text-center">About me</h1>
    <p class="text-center">Nikola Ciganović 40/18</p>
    <p class="text-center">I'm Nikola Ciganović, a Web Developer from Belgrade, Serbia.
        I'm currently a college student in ICT College of Vocational studies, studying Web Development.</p>
    <p class="text-center">My favorite thing to do is to create stuff using my programming knowledge.</p>
</div>
<div class="col-12 d-flex justify-content-center">
    <img width="300px" src="{{ asset("img/profile.jpg") }}" alt="profile pic"/>
</div>
</div>
@endsection