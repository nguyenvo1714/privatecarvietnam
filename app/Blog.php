<?php

namespace App;

use \Conner\Tagging\Taggable;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;
    use Taggable;

    protected $table = 'blogs';
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
        return $this->hasMany('App\Transfer');
    }

    public function type()
    {
        return $this->belongsTo('App\Type');
    }    
}
