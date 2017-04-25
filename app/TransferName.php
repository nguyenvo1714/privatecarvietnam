<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransferName extends Model
{
   	protected $table = 'TransferNames';
   	protected $fillable = [
   		'name',
         'type_id',
         'thumb',
         'description'
   	];

   	public function transfers()
   	{
   		return $this->belongsToMany('App\Transfer');
   	}

      public function type()
      {
         return $this->belongsTo('App\Type');
      }
}
