<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use Sluggable;

    protected $table = 'transfers';
    // protected $connection = 'touringservice';
    protected $fillable = [
    	'type_id',
    	'transferName_id',
    	'place_id',
        'title',
        'slug',
        'duration',
        'image_thumb',
        'image_head',
        'description',
    	'blog_id',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true,
            ]
        ];
    }

    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    public function cars()
    {
    	return $this->belongsToMany('App\Car');
    }

    public function blog()
    {
    	return $this->hasOne('App\Blog', 'id');
    }

    public function place()
    {
    	return $this->hasOne('App\Place', 'id');
    }

    public function transferName()
    {
        return $this->hasOne('App\transferName', 'id');
    }
}
