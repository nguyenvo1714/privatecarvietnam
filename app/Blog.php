<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    protected $table = 'blogs';
    // protected $connection = 'touringservice';
    protected $fillable  = [
        'type_id',
        'title',
        'slug',
    	'content',
    	'author',
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

    public function tour()
    {
    	return $this->belongsToMany('App\Tour', 'blog_id');
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
