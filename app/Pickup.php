<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pickup extends Model
{
    use SoftDeletes;

    protected $table = 'pick_ups';
    protected $dates = ['deleted_at'];
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
