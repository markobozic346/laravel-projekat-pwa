<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function car()
    {
        return $this->hasOne(Car::class);
    }

    public function getServiceType()
    {
        switch ($this->service_type) {
            case 'oil_change':
                return 'Oil Change';
            case 'tire_rotation':
                return 'Tire Rotation';
            case 'regular service':
                return 'Regular Service';
            case 'battery_replacement':
                return 'Battery Replacement';
            case 'other':
                return 'Other';
            default:
                "";

        }
    }

    public function getStatus()
    {
        switch ($this->status) {
            case 'pending':
                return 'Pending';
            case 'approved':
                return 'Approved';
            case 'done':
                return 'Done';
            case 'cancelled':
                return 'Cancelled';
            default:
                "";

        }
    }

}