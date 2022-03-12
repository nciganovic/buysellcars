@extends('layouts.layout-main')
@section('title')
    Contact us
@endsection
@section('content')
<div class="row">
    <div class="col-12 m-3">
        <h1 class="text-center">Contact us</h1>
    </div>
    <div class="col-12">
        <form action="{{ route('post_contact') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" />
                @error('email')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="address">Subject</label>
                <input placeholder="Subject" type="text" class="form-control" id="subject" name="subject" />
                @error('subject')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea placeholder="Message" rows="10" class="form-control" id="message" name="message">

                </textarea>
                @error('message')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary mt-3">Submit</button>

            @if(isset($mail_result) && $mail_result == 1)
            <div class="col-12 bg-success rounded mt-5">
                <p class="text-center p-3">Message sent successfully</p>
            </div>
            @endif

        </form>
    </div>
</div>
@endsection