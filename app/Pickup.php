<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pickup extends Model
{
    protected $table = 'pick_ups';
    protected $fillable = [
    	'name',
    ];

    public function transfers()
    {
        return $this->hasMany('App\Transfer');
    }
}
