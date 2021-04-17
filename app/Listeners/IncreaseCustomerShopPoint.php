<?php

namespace App\Listeners;

use App\Events\ShopBoughtCard;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use DB;
use App\Jobs\IncrementPointsAfterCardApply;


class IncreaseCustomerShopPoint
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
     * @param  object  $event
     * @return void
     */
    public function handle(ShopBoughtCard $event)
    {
        dispatch(new IncrementPointsAfterCardApply($event->shop_id, $event->card_id))->delay(now()->addSeconds(5));
    }
}
