<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sessions;
use App\User;
use App\Card;

class SalesOrder extends Model
{
    //
    protected $fillable = ['id', 'order_date', 'total', 'coupon_id', 'session_id', 'user_id'];


    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function orderAnItem(User $user, Product $product)
    {
    	//order_date => time->now;
    	//total => calculate and find;
    	//coupon_code => card->id;
    	//session_id => sessions->id;
    	//user_id => user->id;
    }
}
