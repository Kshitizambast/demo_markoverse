<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Card;

class Customer extends User
{
    public function card()
    {
        return $this->belongsToMany(Card::class, 'LikesOfCustomers')->as('LikesOfCustomers');
    }


    public function product()
    {
    	return $this->belongsToMany(Product::class, 'DailySales')->as('DailySales');
    }

    public function shops()
    {
    	return $this->belongsToMany(MyShop::class, 'DailySales')->as('DailySales');
    }

    public function daily_sales()
    {
        return $this->hasMany(DailySales::class);
    }

    public function gifts()
    {
        return $this->belongsToMany(Gift::class, 'GiftsToCustomers')->as('GiftsToCustomer');
    }


    
}
