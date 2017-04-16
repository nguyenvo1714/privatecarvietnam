<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransferName extends Model
{
   	protected $table = 'TransferNames';
   	protected $fillable = [
   		'name',
   	];

   	public function transfers()
   	{
   		return $this->belongsToMany('App\Transfer');
   	}
}
