<?php

namespace App\Listeners;

use App\Events\UserParticipatedInEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use DB;

class RegisterUserForEvents
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
        DB::beginTransaction();
            
        try {
            DB::insert('insert into users_per_event_scores (user_id, total_score, winning_index) values (?, ?, ?)', [$event->user_id, 0.0, 0]);

            DB::insert('insert into users_ongoing_events (users_per_event_scores_id, ongoing_events) values (?, ?)', [$event->user_id, $event->event_id]);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }

    }
}
