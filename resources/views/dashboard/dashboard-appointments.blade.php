<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Appointments') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Make</th>
                            <th>Model</th>
                            <th>User</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->id }}</td>
                                <td>{{ $appointment->car->make }}</td>
                                <td>{{ $appointment->car->model }}</td>
                                <td>{{ $appointment->user->name }}</td>
                                <td>{{ $appointment->getServiceType() }}</td>
                                <td>{{ $appointment->getStatus() }}</td>
                                <td>{{ $appointment->date }}</td>
                                <td>{{ $appointment->time }}</td>
                                <td>
                                    <a href="{{ route('dashboard-appointments-update', $appointment->id) }}"
                                        class="btn btn-primary">Edit</a>
                                    <form action="{{ route('dashboard-appointments-delete', $appointment->id) }}"
                                        method="POST" class="d-inline">
                                        @csrf

                                        <button type="submit" class="btn btn-danger bg-red-500 hover:bg-red-700"
                                            onclick="return confirm('Are you sure you want to delete this appointment?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
