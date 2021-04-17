<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiftsToCustomers extends Model
{
    protected $fillable = ['customer_id', 'gift_id'];

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

   

}
