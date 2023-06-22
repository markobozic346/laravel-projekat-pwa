<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    //

    public function createForm()
    {
        return view('add-car');
    }

    public function create(Request $request)
    {
        $car = new Car();
        $car->make = $request->input('make');
        $car->model = $request->input('model');
        $car->year = $request->input('year');
        $car->user_id = Auth::user()->id;
        $car->save();

        return redirect(route('my-cars'));
    }

    public function delete($id)
    {

        $car = Car::findOrFail($id);
        $car->delete();

        return redirect(route('my-cars'));
    }
    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);

        $car->make = $request->input('make');
        $car->model = $request->input('model');
        $car->year = $request->input('year');

        $car->save();

        return redirect(route('my-cars'));
    }

    public function updateForm($id)
    {

        $car = Car::findOrFail($id);

        return view('my-car-update', ['car' => $car]);
    }

    public function myCars()
    {

        return view('my-cars', ['cars' => Auth::user()->cars]);
    }
}