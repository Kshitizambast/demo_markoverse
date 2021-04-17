<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
     protected $fillable = ['daily_sells_id', 'product_id', 'price', 'quantity', 'disscount', 'total', 'fullfilled' ,'sales_tax', 'bill_date'];

	public function dailySells()
	{
		return $this->belongsTo(DailySells::class);
	}

	public function products()
	{
		return $this->belongsTo(Product::class);
	}


	public static function orderJoin($customer_id, $fullfilled)
	{
		         return     DB::table('daily_sells')
	                           ->join('order_details', 'order_details.daily_sells_id', '=', 'daily_sells.id')
	                           ->select('order_details.*')
	                           ->where('daily_sells.customer_id' ,$customer_id)
	                           ->where('daily_sells.fullfilled', $fullfilled)
	                           ->get();
	}

	public static function totalOrder($customer_id, $fullfilled)
	{
		return count(self::orderJoin($customer_id, $fullfilled));
	}

}
