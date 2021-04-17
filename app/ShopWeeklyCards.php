<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopWeeklyCards extends Model
{
    use HasFactory;

    protected $fillable = ['my_shop_id', 'order_cards_id'];
}
