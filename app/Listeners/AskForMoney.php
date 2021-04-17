<?php

namespace App\Listeners;

use App\Events\ShopRunOutOfDays;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AskForMoney
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
        return Mail::to($event->shop->owner->email)->queue(new AskForMoneyMail($event->shop));
    }
}
