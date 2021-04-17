<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DailySells;
use App\Payment;
use DB;

class ApplyCouponOnPayment extends Controller
{

    public $user_id, $shop_id;

    public function __construct($user_id, $shop_id)
    {
        $this->user_id = $user_id;
        $this->shop_id = $shop_id;
    }

    public function applyCoupons()
    {

        DB::beginTransaction();

        try {
            DailySells::where('customer_id', $user_id)
                    ->where('shop_id', $shop_id)
                    ->where('fullfilled', 0)
                    ->update([
                        'extra_off' => $extra_off,
                        'payble'    => $payble
                    ]);

            Payment::where('payment_id', $payment_id)
                    ->update([
                        'paid_amount' => $payble
                    ]);
            
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }
        
    }
    //Get the user
    //Get the shop.
    //Get the payment_details.
    //Apply Coupon
    //Update order_details
}
