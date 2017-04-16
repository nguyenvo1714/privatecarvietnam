<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';
    protected $connection = 'touringservice';
    protected $fillable  = [
        'type_id',
    	'title',
    	'content',
    	'author',
    ];

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
