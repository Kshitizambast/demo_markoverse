<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\CustomerShopConnection;
use App\User;
use App\MyShop;
use App\ShopCustomerWeight;

class CustomerShopConnectionUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'customer:connection';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $shops = MyShop::all();
        $users = User::all();
         foreach($users as $user) {
            $this->makeCustomersConnections($shops, $user);
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
