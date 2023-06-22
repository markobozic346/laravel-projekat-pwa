@extends('layouts.main')

@section('content')
    <section id="booking" class="booking">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h2>Add car</h2>
                    <form method="POST" action="{{ route('my-cars-create') }}">
                        @csrf

                        <div class="form-group">
                            <label for="make">Make:</label>
                            <input type="text" class="form-control" required id="make" name="make" required>
                        </div>

                        <div class="form-group">
                            <label for="model">Model:</label>
                            <input type="text" class="form-control" required id="model" name="model" required>
                        </div>

                        <div class="form-group">
                            <label for="year">Year:</label>
                            <input type="number" class="form-control" required id="year" name="year" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Add Car</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
