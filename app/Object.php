<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObjectModel extends Model
{
     protected $fillable = [
	    'name', 'description', 'user_id'
    ];

    protected $table = 'objects';

    public function coordinate()
    {
        return $this->morphOne('App\Coordinate', 'coordinatetable');
    }

    public function image()
    {
    	return $this->morphMany('App\Image', 'imagetable');
    }

    public function address()
    {
    	return $this->morphOne('App\Address', 'addresstable');
    }

    // public function getAddress()
    // {
    //    $a = Address::where('addresstable_id', '2')->get()->all();
    //    return $a->id;
    // }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
