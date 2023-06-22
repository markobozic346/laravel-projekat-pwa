<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class AppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'type' => 'admin',
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user123'),
            'type' => 'user',
        ]);

        Car::create([
            'make' => 'Fiat',
            'model' => 'Stilo',
            'year' => '2002',
            'user_id' => '2',
        ]);

        Appointment::create([
            'date' => '2021-05-05',
            'time' => '10:00',
            'service_type' => 'oil_change',
            'status' => 'pending',
            'user_id' => '2',
            'car_id' => '1',
        ]);

    }
}
