<?php

namespace App\Listeners;
use App\Commands\ShopNewWeekData;

use App\Events\ShopPaidCovalent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Jobs\NewWeekDataEntryJob;

class CreateShopNewWeekData
{
    
    public function handle(ShopPaidCovalent $event)
    {
        return NewWeekDataEntryJob::dispatch($event->shop);
    }
}
