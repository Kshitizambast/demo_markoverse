<?php

namespace App\Listeners;

use App\Events\CovalentPaidInvestors;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateWalletAfterTransaction
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
     * @param  CovalentPaidInvestors  $event
     * @return void
     */
    public function handle(CovalentPaidInvestors $event)
    {
        //
    }
}
