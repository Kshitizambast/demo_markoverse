<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditRecharge extends Model
{
    //
    protected $fillable = ['investor_id', 'ammount'];

    public function investors()
    {
    	return $this->belongsTo(Investors::class);
    }
}
