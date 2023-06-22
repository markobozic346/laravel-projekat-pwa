@extends('layouts.main')

@section('content')
    <section id="my-appointments">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>My Appointments</h2>
                    <div class="table-responsive">
                        <h3>Pending and Accepted Appointments</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Car Make</th>
                                    <th>Car Model</th>
                                    <th>Service Type</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pendingAppointments as $appointment)
                                    <tr>
                                        <td>{{ $appointment->id }}</td>
                                        <td>{{ $appointment->date }}</td>
                                        <td>{{ $appointment->time }}</td>
                                        <td>{{ $appointment->car->make }}</td>
                                        <td>{{ $appointment->car->model }}</td>
                                        <td>{{ $appointment->getServiceType() }}</td>
                                        <td>{{ $appointment->getStatus() }}</td>
                                        <td>
                                            <a href="{{ route('schedule-update-form', $appointment->id) }}"
                                                class="btn btn-primary">Edit</a>
                                            <form action="{{ route('schedule-delete', $appointment->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this appointment?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                <!-- Add more rows for pending and accepted appointments -->
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <h3>Done and Canceled Appointments</h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Car Make</th>
                                    <th>Car Model</th>
                                    <th>Service Type</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($completedAppointments as $appointment)
                                    <tr>
                                        <td>{{ $appointment->id }}</td>
                                        <td>{{ $appointment->date }}</td>
                                        <td>{{ $appointment->time }}</td>
                                        <td>{{ $appointment->car->make }}</td>
                                        <td>{{ $appointment->car->model }}</td>
                                        <td>{{ $appointment->getServiceType() }}</td>
                                        <td>{{ $appointment->getStatus() }}</td>
                                        <td>
                                            <a href="" class="btn btn-primary">Edit</a>
                                            <form action="" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this car?')">Delete</button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
