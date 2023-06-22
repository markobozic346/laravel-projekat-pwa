@extends('layouts.main')

@section('content')
    <section id="booking" class="booking">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h2>Book Your Car Service</h2>

                    @if ($user->cars->count() == 0)
                        <p class="text-danger">You need to add a car before you can book a service.</p>
                        <a href="{{ route('my-cars-create') }}" class="btn btn-primary">Add a Car</a>
                    @else
                        <form action="{{ route('schedule-create') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="serviceType" class="form-label">Service Type</label>
                                <select class="form-select" required id="serviceType" name="serviceType" required>
                                    <option value="oil_change">Oil Change</option>
                                    <option value="tire_rotation">Tire Rotation</option>
                                    <option value="regular service">Regular Service</option>
                                    <option value="battery_replacement">Battery Replacement</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="car">Select a Car:</label>
                                <select class="form-control" id="car" required name="car">
                                    @foreach ($user->cars as $car)
                                        <option value="{{ $car->id }}">{{ $car->make }} - {{ $car->model }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" required class="form-control" id="date" name="date" required>
                            </div>
                            <div class="mb-3">
                                <label for="hour" class="form-label">Time</label>
                                <input type="time" required class="form-control" id="time" name="time" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </section>
@endsection
