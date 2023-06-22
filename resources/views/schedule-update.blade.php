@extends('layouts.main')

@section('content')
    <section id="booking" class="booking">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h2>Book Your Car Service</h2>


                    <form action="{{ route('schedule-update', $schedule->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="serviceType" class="form-label">Service Type</label>
                            <select class="form-select" required id="serviceType" name="serviceType">
                                <option value="oil_change" @if ($schedule->service_type === 'oil_change') selected @endif>Oil Change
                                </option>
                                <option value="tire_rotation" @if ($schedule->service_type === 'tire_rotation') selected @endif>Tire
                                    Rotation</option>
                                <option value="regular service" @if ($schedule->service_type === 'regular service') selected @endif>
                                    Regular Service</option>
                                <option value="battery_replacement" @if ($schedule->service_type === 'battery_replacement') selected @endif>
                                    Battery Replacement</option>
                                <option value="other" @if ($schedule->service_type === 'other') selected @endif>Other</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="car">Select a Car:</label>
                            <select class="form-control" id="car" required name="car">
                                @foreach ($user->cars as $car)
                                    <option value="{{ $car->id }}" @if ($schedule->car->id == $car->id) selected @endif>
                                        {{ $car->make }} -
                                        {{ $car->model }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" required class="form-control" id="date" name="date"
                                value="{{ $schedule->date }}">
                        </div>
                        <div class="mb-3">
                            <label for="hour" class="form-label">Time</label>
                            <input type="time" required class="form-control" id="time" name="time"
                                value="{{ $schedule->time }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>


                </div>
            </div>
        </div>
    </section>
@endsection
