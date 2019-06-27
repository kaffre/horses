<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

	protected $fillable = [
	   'country', 'city', 'street', 'number', 'addresstable_id', 'addresstable_type'
    ];


    public function addresstable()
    {
    	return $this->morphTo();
    }
}
