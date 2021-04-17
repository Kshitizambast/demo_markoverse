<?php

namespace App\Listeners;

use App\Events\CustomerPaidToShop;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\ShopToShopConnections;
use App\ShopCustomerWeight;
use App\User;

class PointDistribution
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

        $connections = ShopToShopConnections::where('connector_shop_id', $shop_id)->get();

        foreach ($connections as $connection) {

            if($this->checkConnection($connection->connected_shop_id, $customer_id) == false){
                ShopCustomerWeight::create([

                                        'my_shop_id' => $connection->connected_shop_id,
                                        'customer_id' => $customer_id,
                                        'store_points' => 10,

                                    ]);
            }
            else{

                ShopCustomerWeight::where('my_shop_id', $connection->connected_shop_id)
                                ->where('customer_id', $customer_id)
                                ->increment('store_points', 10); 
            }
            
        }



    }


    public function checkConnection($shop_id, $user_id)
    {
        $data = ShopCustomerWeight::where('my_shop_id', $shop_id)
                                    ->where('customer_id', $user_id)
                                    ->get();
        if(count($data) > 0)
            return true;
        else
            return false;

    }



}
