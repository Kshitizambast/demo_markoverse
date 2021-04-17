<?php

namespace App\Listeners;

use App\Events\ShopPaidCovalent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\MyShop;

class ActivateShopServices
{
   
     
    public function handle(ShopPaidCovalent $event)
    {
       return  MyShop::where('id', $event->shop->id)
                     ->update(['open_for_investment' => 1,
                 			   'maximum_investor_count' => 5,
                 			   'days_left_to_deactive'=> 9
                 			]);
    }
}
