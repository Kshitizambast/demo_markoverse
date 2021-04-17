<?php

namespace App\Listeners;

use App\Events\ShopPaidCovalent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateInvestorsEarning
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
     * @param  ShopPaidCovalent  $event
     * @return void
     */
    public function handle(ShopPaidCovalent $event)
    {
        //
    }
}
