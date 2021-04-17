<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Landmark extends Model
{
    //

    protected $guards = [];

    public function shops()
    {
    	$this->hasMany(Shop::class);
    }
}
