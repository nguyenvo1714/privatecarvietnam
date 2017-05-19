<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $table = 'tours';
    // protected $connection = 'touringservice';
    protected $fillable = [
    	'tour_id',
    	'name',
        'interval',
        'start_date',
    	'endDate',
    	'price', 
    	'description',
    	'program',
    	'blog_id',
        'is_discount',
        'discount_value',
    ];

    public function type()
    {
    	return $this->belongsTo('App\Type');
    }

    public function blog()
    {
    	return $this->hasOne('App\Blog', 'id');
    }
}
