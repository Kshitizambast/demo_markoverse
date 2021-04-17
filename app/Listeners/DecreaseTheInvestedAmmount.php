<?php

namespace App\Listeners;

use App\Events\TaskDone;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DecreaseTheInvestedAmmount
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
        
        $new_invested_ammount = $investment->invested_ammount - ($investment->invested_ammount * ($tak->tasks_recovery_percentage / 100));
        DB::update('update investments set ');
    }
}
