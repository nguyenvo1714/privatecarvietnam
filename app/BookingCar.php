<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingCar extends Model
{
    protected $table = 'booking_cars';
    protected $fillable = [
        'transfer_id',
    	'trip',
        'duration',
        'passenger',
        'cost',
        'pickup_address',
        'departure_date',
        'departure_time',
        'dropoff_address',
        'name',
        'surname',
        'email',
        'phone',
        'note'
    ];

    public function transfers()
    {
        return $this->hasOne('App\Transfer');
    }
}
