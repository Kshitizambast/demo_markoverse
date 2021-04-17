<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopImages extends Model
{
    protected $fillable = ['my_shop_id', 'filename'];

    public function my_shop()
    {
    	return $this->belongsTo(MyShop::class);
    }
}
