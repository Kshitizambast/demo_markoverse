<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = ['state_name', 'country_id'];

    public function city()
    {
    	return $this->hasMany(City::class);
    }
}
