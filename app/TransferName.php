<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class TransferName extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    protected $table = 'transfer_names';
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
        return $this->hasMany('App\Transfer');
   	}

    public function places()
    {
        return $this->hasMany('App\Place');
    }

    public function pick_ups()
    {
        return $this->hasMany('App\Pickup');
    }

    public function type()
    {
        return $this->belongsTo('App\Type');
    }
}
