<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $table = 'drivers';
    // protected $connection = 'touringservice';
    protected $fillable = [
    	'fullName',
    	'address',
    	'phone',
    	'birthday',
    	'age',
    ];

    public function car()
    {
    	return $this->belongsTo('App\Car');
    }
}
