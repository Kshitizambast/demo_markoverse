<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerOfDayGifts extends Model
{
    protected $fillable = ['customer_id', 'gift_id'];

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    
}
