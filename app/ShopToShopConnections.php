<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopToShopConnections extends Model
{
   

    protected $fillable = ['connector_shop_id', 'connected_shop_id'];

}
