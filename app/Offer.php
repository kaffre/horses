<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{

     protected $fillable = [
        'name', 'content', 'position', 'category_id', 'user_id'
    ];


    public function address()
    {
    	return $this->morphOne('App\Address', 'addresstable');
    }

    public function coordinate()
    {
    	return $this->morphOne('App\Coordinate', 'coordinatetable');
    }

    public function image()
    {
        return $this->morphMany('App\Image', 'imagetable');
    }

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }
}
