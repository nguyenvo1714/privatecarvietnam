<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = 'places';
    protected $fillable = [
    	'name',
    	'isHot',
    	'isNew',
    ];

    public function tour()
    {
    	return $this->belongsToMany('App\Tour');
    }
}
