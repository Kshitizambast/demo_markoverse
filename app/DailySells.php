<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class DailySells extends Model
{
    protected $fillable = [ 'customer_id', 'my_shop_id', 'payment_id', 'order_date', 
							'salesTax', 'error_msg', 'fullfilled', 'deleted', 'paid', 'order_id',
							'payment_date', 'razorpay_signature', 'razorpay_payment_id', 'order_status_id','payble' , 'reference_code'];

	public function orderDetails()
	{
		return $this->hasMany(OrderDetails::class);
	}

	public function payment()
	{
		return $this->hasOne(Payment::class);
	}

	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}

	public function shops()
	{
		return $this->belongsTo(MyShop::class);
	}

	public static function sqlQuery($customer_id, $shop_id)
	{
		return self::where('customer_id', $customer_id)
					  ->where('my_shop_id', $shop_id)
					  ->where('fullfilled', 1)
					  ->get();
	}

	public static function totalPaid($customer_id, $shop_id)
	{
		$ammount = self::sqlQuery($customer_id, $shop_id);
		$paid = 0;
		foreach ($ammount as $am) {
			$paid += $am->paid;
		}
		return $paid; 
	}

	public static function countCustomerOrders($customer_id, $shop_id)
	{
		$orders = self::sqlQuery($customer_id, $shop_id);
		 return count($orders);
	}


}
