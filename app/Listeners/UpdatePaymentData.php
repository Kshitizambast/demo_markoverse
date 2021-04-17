<?php

namespace App\Listeners;

use App\Events\CustomerPaidToShop;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Payment;
use App\DailySells;
use App\OrderDetails;
use DB;

class UpdatePaymentData
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CustomerPaidToShop  $event
     * @return void
 */
    public function handle(CustomerPaidToShop $event)
    {

        $customer_id = $event->customer_id;
        $shop_id = $event->shop_id;
        $payment_purpose_id = $event->payment_purpose_id;
        $total = $event->total;


        
        $customerBag = DB::select('select id from daily_sells where customer_id = '.$customer_id.' and my_shop_id = '.$shop_id. ' and fullfilled = 0');




        DB::beginTransaction();
        try {
            


            $payment = Payment::create([
                               'payment_type' => 'cash',
                               'payment_purpose_id' => $payment_purpose_id,
                               'paid_amount'       => $total,
                               'allowed'        => 1 
                            ]);


            DB::table('daily_sells')
                ->where('id', $customerBag[0]->id)
                ->update([
                                'fullfilled' => 1,
                                'payment_id' => $payment->id,
                                'paid'       => $total,
                                'payment_date' => date("Y-m-d")
                        ]);

            DB::table('order_details')
                ->where('daily_sells_id', $customerBag[0]->id)
                ->update([
                            'fullfilled' => 1,
                            'bill_date'  => date("Y-m-d")
                        ]); 

                       
                 DB::commit();



        } catch (Exception $e) {
            DB::rollback();
        }

    }
}
