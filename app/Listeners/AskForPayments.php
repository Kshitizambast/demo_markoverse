<?php

namespace App\Listeners;

use App\Events\ShopRunOutOfDays;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AskForPayments
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
        //
    }
}
