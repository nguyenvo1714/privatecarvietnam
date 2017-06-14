<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = 'places';
    protected $fillable = [
        'name',
        'transfer_name_id',
        // 'is_hot',
        // 'is_new',
    ];

    public function tour()
    {
    	return $this->belongsToMany('App\Tour');
    }

    public function transfer_name()
    {
        return $this->belongsTo('App\TransferName');
    }

    public function transfers()
    {
        return $this->hasMany('App\Transfer');
    }
}
