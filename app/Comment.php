<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guards = [];

    protected $fillable = ['comment', 'shop_id'];

    public function shops()
    {
    	return $this->belongsTo(MyShop::class);
    }

     public function cards()
    {
    	return $this->belongsTo(Shop::class);
    }


}
