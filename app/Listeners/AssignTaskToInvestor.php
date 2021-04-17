<?php

namespace App\Listeners;

use App\Events\InvestorInvested;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Tasks;

class AssignTaskToInvestor
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
     * @param  InvestorInvested  $event
     * @return void
     */
    public function handle(InvestorInvested $event)
    {
        
    }
}
