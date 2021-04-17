<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $fillable = ['state_id', 'city'];

    public function state()
    {
    	return $this->belongsTo(State::class);
    }

    public function shop()
    {
    	return $this->hasMany(MyShop::class);
    }
}
