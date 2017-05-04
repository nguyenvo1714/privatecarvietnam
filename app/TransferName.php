<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class TransferName extends Model
{
    use Sluggable;
   	protected $table = 'TransferNames';
   	protected $fillable = [
        'name',
        'slug',
        'type_id',
        'thumb',
        'description'
   	];

      /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
        public function sluggable()
        {
            return [
                'slug' => [
                    'source' => 'name',
                    'onUpdate' => true,
                ]
            ];
        }

   	public function transfers()
   	{
   		return $this->belongsToMany('App\Transfer');
   	}

      public function type()
      {
         return $this->belongsTo('App\Type');
      }
}
