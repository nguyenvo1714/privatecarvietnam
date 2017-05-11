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
        'pickupAddress',
        'departureDate',
        'departureTime',
        'dropoffAddress',
        'name',
        'surname',
        'email',
        'phone',
        'note'
    ];
}
