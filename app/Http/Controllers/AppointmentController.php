<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Car;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    //


    public function create(Request $request)
    {

        $appointment = new Appointment();
        $appointment->date = $request->input('date');
        $appointment->time = $request->input('time');
        $appointment->service_type = $request->input('serviceType');
        $appointment->user_id = Auth::user()->id;
        $appointment->car_id = $request->input('car');
        $appointment->save();

        return redirect(route('my-appointments'));

    }

    public function delete($id)
    {

        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect(route('my-appointments'));
    }
    public function scheduleForm()
    {

        $user = Auth::user();

        return view('schedule', ['user' => $user]);

    }

    public function myAppointments()
    {

        $user = Auth::user();

        $allAppointments = Appointment::where('user_id', $user->id)->get();

        foreach ($allAppointments as $appointment) {
            $appointment->car = Car::findOrFail($appointment->car_id);
        }

        $pendingAppointments = $allAppointments->filter(function ($appointment) {
            return $appointment->status === 'pending' || $appointment->status === 'approved';
        });

        $completedAppointments = $allAppointments->filter(function ($appointment) {
            return $appointment->status === 'done' || $appointment->status === 'cancelled';
        });

        return view('my-appointments', compact('pendingAppointments', 'completedAppointments'));
    }

    public function update(Request $request, $id)
    {
        $schedule = Appointment::findOrFail($id);


        $schedule->service_type = $request->input('serviceType');
        $schedule->car_id = $request->input('car');
        $schedule->date = $request->input('date');
        $schedule->time = $request->input('time');
        $schedule->save();

        return redirect(route('my-appointments'));

    }
    public function updateForm($id)
    {
        $schedule = Appointment::findOrFail($id);

        $schedule->car = Car::findOrFail($schedule->car_id);
        $user = Auth::user();

        return view('schedule-update', ['id' => $schedule->id, 'schedule' => $schedule, 'user' => $user]);

    }
}