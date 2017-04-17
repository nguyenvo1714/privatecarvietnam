<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';
    // protected $connection = 'touringservice';
    protected $fillable = [
    	'name',
    ];

    public function tour()
    {
    	return $this->hasMany('App\Tour');
    }

    public function blogs()
    {
    	return $this->hasMany('App\Blog');
    }
}
