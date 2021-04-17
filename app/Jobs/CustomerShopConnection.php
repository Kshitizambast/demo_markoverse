<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\ShopCustomerWeight;


class CustomerShopConnection implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public $shops, $users;
    public function __construct($shops, $users)
    {
        $this->shops = $shops;
        $this->users = $users;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        foreach ($this->users as $user) {
            $this->makeCustomersConnections($this->shops, $user);
        }
    }

    public function makeCustomersConnections($shops, $user)
    {
          foreach($shops as $shop){
              if($user->gender == "Female"){
                if($shop->category_id == 2 or $shop->category_id == 10)
                    continue;
                else{ 

                    if($this->checkConnection($user->id, $shop->id) == false){
                         ShopCustomerWeight::create([
                            'my_shop_id' => $shop->id,
                            'customer_id'=> $user->id,
                            'weight'     =>  0,
                            'store_points' => 10
                        ]);
                    }
                       

                }
                                   
              }

              elseif($user->gender == "Male"){
                if($shop->category_id == 3 or $shop->category_id == 11)
                   continue;
                else{

                      if($this->checkConnection($user->id, $shop->id) == false){
                         ShopCustomerWeight::create([
                            'my_shop_id' => $shop->id,
                            'customer_id'=> $user->id,
                            'weight'     =>  0,
                            'store_points' => 10
                        ]);
                    }
                }
                  
                
            }
             else
                return 0;

            
        //If gender is female connect to every shop but of male
        //not to id=10 and 2.

        //if male connect to every shop but 11 and 3       
        }
    }


     public function checkConnection($user_id, $shop_id)
     {
            $data  = ShopCustomerWeight::where('customer_id', $user_id)
                                ->where('my_shop_id', $shop_id)
                                ->get();
            if(count($data) > 0)
                return true;
            else
                return false;
    }


}
