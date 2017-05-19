<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    protected $table = 'types';
    // protected $connection = 'touringservice';
    protected $fillable = [
        'name',
        'slug',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true,
            ]
        ];
    }

    public function tour()
    {
    	return $this->hasMany('App\Tour');
    }

    public function blogs()
    {
    	return $this->hasMany('App\Blog');
    }

    public function transfer_names()
    {
        return $this->hasMany('App\TransferName', 'type_id');
    }
}
