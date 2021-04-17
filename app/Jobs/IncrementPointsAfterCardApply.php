<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\LikesOfCustomers;
use App\CardFeature;
use App\ShopCustomerWeight;

class IncrementPointsAfterCardApply implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $shop_id, $card_id;
    public function __construct($shop_id, $card_id)
    {
        $this->shop_id =  $shop_id;
        $this->card_id = $card_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() 
    {
        //find customers with that cards.
        
        $likes_of_customers = LikesOfCustomers::where('card_id', $this->card_id)->get();
        $card_feature       = CardFeature::where('card_id', $this->card_id)
                                          ->get();


        $last_point_booster = $card_feature[0]->last_point_booster;

        foreach($likes_of_customers as $customer) {
            if($this->checkConnection($this->shop_id, $customer->customer_id) == true){
                ShopCustomerWeight::where('my_shop_id', $this->shop_id)
                                ->where('customer_id', $customer->customer_id)
                                ->increment('store_points', $last_point_booster);
            }
            else
                ShopCustomerWeight::create([
                                        'my_shop_id' => $this->shop_id,
                                        'customer_id' => $customer->customer_id,
                                        'store_points' => $last_point_booster,
                                        ]);
            
        }

        return true;
    }


    public function checkConnection($shop_id, $user_id)
    {
        $data = ShopCustomerWeight::where('my_shop_id', $shop_id)
                                    ->where('customer_id', $user_id)
                                    ->get();
        if(count($data) > 0)
            return true;
        else
            return false;

    }
}
