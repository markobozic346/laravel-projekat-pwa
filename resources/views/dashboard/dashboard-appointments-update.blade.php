<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Update appointment {{ $appointment->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <section id="booking" class="booking">
                    <div class="container">
                        <div class="row">

                            <form action="{{ route('dashboard-appointments-update', $appointment->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="serviceType" class="form-label">Service Type</label>
                                    <select class="form-select" required id="serviceType" name="serviceType">
                                        <option value="oil_change" @if ($appointment->service_type === 'oil_change') selected @endif>Oil
                                            Change
                                        </option>
                                        <option value="tire_rotation" @if ($appointment->service_type === 'tire_rotation') selected @endif>
                                            Tire
                                            Rotation</option>
                                        <option value="regular service"
                                            @if ($appointment->service_type === 'regular service') selected @endif>
                                            Regular Service</option>
                                        <option value="battery_replacement"
                                            @if ($appointment->service_type === 'battery_replacement') selected @endif>
                                            Battery Replacement</option>
                                        <option value="other" @if ($appointment->service_type === 'other') selected @endif>Other
                                        </option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Service Type</label>
                                    <select class="form-select" required id="status" name="status">
                                        <option value="pending" @if ($appointment->status === 'pending') selected @endif>
                                            Pending
                                        </option>
                                        <option value="approved" @if ($appointment->status === 'approved') selected @endif>
                                            Approved</option>
                                        <option value="done" @if ($appointment->status === 'done') selected @endif>
                                            Done</option>
                                        <option value="cancelled" @if ($appointment->status === 'battery_replacement') selected @endif>
                                            Cancelled</option>

                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="car">Select a Car:</label>
                                    <input class="form-control" id="car" name='car' readonly
                                        value="{{ $appointment->car->make }} {{ $appointment->car->model }}" />
                                </div>

                                <div class="mb-3">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" required class="form-control" id="date" name="date"
                                        value="{{ $appointment->date }}">
                                </div>
                                <div class="mb-3">
                                    <label for="hour" class="form-label">Time</label>
                                    <input type="time" required class="form-control" id="time" name="time"
                                        value="{{ $appointment->time }}">
                                </div>
                                <button type="submit"
                                    class="btn btn-primary bg-blue-500 hover:bg-blue-700">Submit</button>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
