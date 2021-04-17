<?php

namespace App\Listeners;

use App\Events\TaskDone;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateWalletAfterTask
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
     * @param  TaskDone  $event
     * @return void
     */
    public function handle(TaskDone $event)
    {
        //
    }
}
