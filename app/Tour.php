<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $table = 'tours';
    protected $connection = 'touringservice';
    protected $fillable = [
    	'tour_id',
    	'name',
    	'interval',
    	'startDate',
    	'endDate',
    	'price', 
    	'description',
    	'program',
    	'blog_id',
        'isDiscount',
        'discountValue',
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
