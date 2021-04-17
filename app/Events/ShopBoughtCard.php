<?php

namespace App\Events;

use App\MyShop;
use App\Card;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ShopBoughtCard 
{
    use Dispatchable, SerializesModels;
    public $shop_id, $card_id;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($shop_id, $card_id)
    {
        $this->shop_id = $shop_id;
        $this->card_id = $card_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
}
