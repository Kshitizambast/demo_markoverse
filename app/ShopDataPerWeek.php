<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Library\DataModelOfShop;

class ShopDataPerWeek extends Model
{
    //

     protected $fillable = ['my_shop_id','order_cards_id', 'payment_id', 'total_stock_price', 
                           'total_template_shared','can_invest_indivisually', 'recovery_code'];


     


    public function myshop()
    {
    	return $this->belongsTo(MyShop::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function orderCards()
    {
    	return $this->hasOne(OrderCards::class);
    }

    public static function getDataOfShop($shop_id)
    {
        return DB::select('select * from shop_data_per_weeks where my_shop_id = '.$shop_id.' and payment_id = 0');
    } 

   

    
}
