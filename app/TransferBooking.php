<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransferBooking extends Model
{
    protected $table = 'transfer_booking';
    protected $fillable = [
    	'trip',
        'duration',
        'passenger',
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
}
