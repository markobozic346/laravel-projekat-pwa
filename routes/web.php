<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');
;

Route::get('/my-cars', [CarController::class, 'myCars'])->middleware(['auth', 'verified'])->name('my-cars');
Route::get('/my-cars/create', [CarController::class, 'createForm'])->middleware(['auth', 'verified'])->name('my-cars-create-form');
Route::post('my-cars/create', [CarController::class, 'create'])->middleware(['auth', 'verified'])->name('my-cars-create');
Route::post('my-cars/delete/{id}', [CarController::class, 'delete'])->middleware(['auth', 'verified'])->name('my-cars-delete');
Route::get('my-cars/update/{id}', [CarController::class, 'updateForm'])->middleware(['auth', 'verified'])->name('my-cars-update-form');
Route::post('my-cars/update/{id}', [CarController::class, 'update'])->middleware(['auth', 'verified'])->name('my-cars-update');

Route::get('/schedule', [AppointmentController::class, 'scheduleForm'])->middleware(['auth', 'verified'])->name('schedule');
Route::post('/schedule/create', [AppointmentController::class, 'create'])->middleware(['auth', 'verified'])->name('schedule-create');
Route::get('schedule/update/{id}', [AppointmentController::class, 'updateForm'])->middleware(['auth', 'verified'])->name('schedule-update-form');
Route::post('schedule/update/{id}', [AppointmentController::class, 'update'])->middleware(['auth', 'verified'])->name('schedule-update');
Route::post('schedule/delete/{id}', [AppointmentController::class, 'delete'])->middleware(['auth', 'verified'])->name('schedule-delete');
Route::get('/my-appointments', [AppointmentController::class, 'myAppointments'])->middleware(['auth', 'verified'])->name('my-appointments');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified', 'admin'])->name('dashboard');
Route::get('/dashboard/cars', [DashboardController::class, 'cars'])->middleware(['auth', 'verified', 'admin'])->name('dashboard-cars');
Route::post('/dashboard/cars/delete/{id}', [DashboardController::class, 'carDelete'])->middleware(['auth', 'verified', 'admin'])->name('dashboard-cars-delete');
Route::get('/dashboard/appointments', [DashboardController::class, 'appointments'])->middleware(['auth', 'verified', 'admin'])->name('dashboard-appointments');
Route::get('/dashboard/appointments/update/{id}', [DashboardController::class, 'appointmentUpdateForm'])->middleware(['auth', 'verified', 'admin'])->name('dashboard-appointments-update-form');
Route::post('/dashboard/appointments/update/{id}', [DashboardController::class, 'appointmentUpdate'])->middleware(['auth', 'verified', 'admin'])->name('dashboard-appointments-update');
Route::post('/dashboard/appointments/delete/{id}', [DashboardController::class, 'appointmentDelete'])->middleware(['auth', 'verified', 'admin'])->name('dashboard-appointments-delete');
Route::get('/dashboard/users', [DashboardController::class, 'users'])->middleware(['auth', 'verified', 'admin'])->name('dashboard-users');
Route::post('/dashboard/users/delete/{id}', [DashboardController::class, 'userDelete'])->middleware(['auth', 'verified', 'admin'])->name('dashboard-users-delete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__ . '/auth.php';