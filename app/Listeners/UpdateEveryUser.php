<?php

namespace App\Listeners;

use App\Events\LikedByUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateEveryUser
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
     * @param  LikedByUser  $event
     * @return void
     */
    public function handle(LikedByUser $event)
    {
        //
    }
}
