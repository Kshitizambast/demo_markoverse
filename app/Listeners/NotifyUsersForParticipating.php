<?php

namespace App\Listeners;

use App\Events\UserParticipatedInEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Notification;
use App\MarkoverseEvents;
use App\User;
use App\Notifications\UserParticipatedInEventNotification;

class NotifyUsersForParticipating
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
     * @param  UserParticipatedInEvent  $event
     * @return void
     */
    public function handle(UserParticipatedInEvent $event)
    {
        $event_name = MarkoverseEvents::find($event->event_id)->type;
        $user = User::find($event->user_id);
        $user->notify(new UserParticipatedInEventNotification($event_name));
        //Notification::send($event->user_id, new UserParticipatedInEventNotification($event_name));
    }
}
