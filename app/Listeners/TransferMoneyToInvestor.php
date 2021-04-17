<?php

namespace App\Listeners;

use App\Events\InvestorsAskedForMoney;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TransferMoneyToInvestor
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
     * @param  InvestorsAskedForMoney  $event
     * @return void
     */
    public function handle(InvestorsAskedForMoney $event)
    {
        //
    }
}
