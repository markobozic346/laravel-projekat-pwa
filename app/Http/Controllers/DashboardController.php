<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //


    public function users()
    {

        $allUsers = User::all();

        return view('/dashboard/dashboard-users', ['users' => $allUsers]);
    }

    public function cars()
    {

        $allCars = Car::all();

        return view('/dashboard/dashboard-cars', ['cars' => $allCars]);

    }

    public function carDelete($id)
    {

        $car = Car::findOrFail($id);
        $car->delete();

        return redirect(route('dashboard-cars'));

    }
    public function userDelete($id)
    {

        $user = User::findOrFail($id);
        $user->delete();

        return redirect(route('dashboard-users'));

    }

    public function dashboard()
    {
        return view('/dashboard/dashboard');
    }
    public function appointments()
    {

        $allAppointments = Appointment::all();

        foreach ($allAppointments as $appointment) {
            $appointment->car = Car::findOrFail($appointment->car_id);
            $appointment->user = User::findOrFail($appointment->user_id);
        }

        return view('/dashboard/dashboard-appointments', ['appointments' => $allAppointments]);

    }

    public function appointmentDelete($id)
    {

        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect(route('dashboard-appointments'));

    }

    public function appointmentUpdateForm($id)
    {
        $appointment = Appointment::findOrFail($id);

        $appointment->car = Car::findOrFail($appointment->car_id);

        return view('/dashboard/dashboard-appointments-update', ['appointment' => $appointment]);

    }

    public function appointmentUpdate(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);


        $appointment->service_type = $request->input('serviceType');
        $appointment->status = $request->input('status');
        $appointment->date = $request->input('date');
        $appointment->time = $request->input('time');
        $appointment->save();

        return redirect(route('dashboard-appointments'));

    }
}