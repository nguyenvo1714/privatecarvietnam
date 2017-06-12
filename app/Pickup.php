<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pickup extends Model
{
    protected $table = 'pick_ups';
    protected $fillable = [
    	'name',
        'transfer_name_id',
    ];

    public function transfers()
    {
        return $this->hasMany('App\Transfer');
    }

    public function transfer_name()
    {
        return $this->belongsTo('App\TransferName');
    }
}
