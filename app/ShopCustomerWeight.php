<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopCustomerWeight extends Model
{
    protected $fillable = ['my_shop_id', 'customer_id', 'weight', 'store_points'];
}
