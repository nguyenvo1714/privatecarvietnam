<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transfer extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;
    use SoftDeletes;

    protected $table = 'transfers';
    protected $dates = ['deleted_at'];
    protected $fillable = [
    	'type_id',
        'transfer_name_id',
        'pick_up_id',
    	'place_id',
        'title',
        'slug',
        'duration',
        'image_thumb',
        'image_head',
        'description',
        'blog',
        'is_hot',
        'is_discount',
        'discount_value',
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
        return $this->belongsTo('App\Blog');
    }

    public function place()
    {
        return $this->belongsTo('App\Place');
    }

    public function pick_up()
    {
        return $this->belongsTo('App\Pickup');
    }

    public function transfer_name()
    {
        return $this->belongsTo('App\TransferName');
    }

    public function booking_cars()
    {
        return $this->belongsToMany('App\BookingCar');
    }
}
