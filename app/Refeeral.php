<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refeeral extends Model
{
    protected $fillable = ['host_id', 'guest_id'];

    public function users()
    {
    	return $this->belongsToMany(User::class);
    }

    
   
}
