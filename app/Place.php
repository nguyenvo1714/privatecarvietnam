<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = 'places';
    protected $fillable = [
        'name',
        'is_hot',
        'is_new',
    ];

    public function tour()
    {
    	return $this->belongsToMany('App\Tour');
    }

    public function place()
    {
        return $this->belongsToMany('App\Transfer');
    }
}
