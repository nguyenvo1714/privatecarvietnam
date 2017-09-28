<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Place extends Model
{
    use SoftDeletes;

    protected $table = 'places';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'transfer_name_id',
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
