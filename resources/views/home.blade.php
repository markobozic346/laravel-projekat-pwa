@extends('layouts.main')

@section('content')
    <section class="hero d-flex align-items-center justify-content-center"
        style="background-image: url('https://wallpaperaccess.com/full/2085169.jpg'); height: 800px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1 style="background-color: rgba(128, 128, 128, 0.5); color: white; padding: 20px;">Book Your Car
                        Service Appointment</h1>
                    <p style="background-color: rgba(128, 128, 128, 0.5);" class='text-white'>Fast and reliable car service
                        appointments at your convenience.</p>
                    <a href="{{ route('schedule') }}" class="btn btn-primary">Book Now</a>
                </div>
            </div>
        </div>
    </section>
@endsection
