<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['name', 'imagetable_type', 'imagetable_id'];

    public function imagetable()
    {
    	return $this->morphTo();
    }
}
