<?php

namespace App\Listeners;

use App\Events\ShopRunOutOfDays;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\MyShop;

class BlockPrivilagesOfShop
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
     * @param  ShopRunOutOfDays  $event
     * @return void
     */
    public function handle(ShopRunOutOfDays $event)
    {
        return MyShop::where('id', $event->shop->id)
                      ->update(['open_for_investment' => false]);
    }
}
