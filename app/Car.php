<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';
    protected $fillable = [
    	'driver_id',
    	'fleet',
    	'capability',
    	'price',
    	'class',
    	'baggage', 
    	'isActive',
    ];

    public function driver()
    {
    	return $this->hasOne('App\Driver');
    }

    public function Transfers()
    {
        return $this->belongsToMany('App\Transfer')->withTimestamps();
    }
}
