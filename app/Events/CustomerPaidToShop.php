<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\MyShop;



class CustomerPaidToShop implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels; 
  
    public $shop_id, $customer_id, $payment_purpose_id, $total;



    public function __construct($shop_id, $customer_id, $payment_purpose_id, $total)
    {
        $this->shop_id = $shop_id;
        $this->customer_id = $customer_id;
        $this->payment_purpose_id = $payment_purpose_id;
        $this->total   = $total;

    }
   

    public function broadcastOn()
    {       
        return new PrivateChannel('customer.'.$this->customer_id);
    }

    public function boradcastWith()
    {
        $extra = [
            'shop_name' => MyShop::findOrFail($this->shop_id)->shop_name

        ];

        return array_merge(array1);
    }

    
}
