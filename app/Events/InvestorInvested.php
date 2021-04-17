<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;

class InvestorInvested implements ShouldBroadcast
{
    use Dispatchable, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */


    public $investor, $shop;

    public function __construct($investor, $shop)
    {
        $this->investor = $investor;
        $this->shop = $shop;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('user.'.$this->investor->id);
    }

   
}
