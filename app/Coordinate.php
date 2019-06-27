<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coordinate extends Model
{
	protected $fillable = ['lat', 'lon', 'coordinatetable_type', 'coordinatetable_id'];

    public function coordinatetable()
    {
    	return $this->morphTo();
    }
}
