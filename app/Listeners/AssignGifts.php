<?php

namespace App\Listeners;

use App\Events\CustomerPaidToShop;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AssignGifts
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
        //
    }
}
