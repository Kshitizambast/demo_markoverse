<?php

namespace App\Listeners;

use App\Events\ShopBoughtCard;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;
use App\Notifications\UserCardApplied;

class NotifyUsers
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
     * @param  ShopBoughtCard  $event
     * @return void
     */
    public function handle(ShopBoughtCard $event)
    {
        $users = User::all();
        //$users->notify(new UserCardApplied($event->card_id, $event->shop_id));
        Notification::send($users, new UserCardApplied($event->card_id, $event->shop_id));

        return false;
    }
}
