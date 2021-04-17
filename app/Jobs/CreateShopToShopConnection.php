<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\ShopToShopConnections;
use DB;

class CreateShopToShopConnection implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $shop_id, $category_id, $city_id;
    public function __construct($shop_id, $category_id, $city_id)
    {
        $this->shop_id      =    $shop_id;
        $this->category_id  =    $category_id;
        $this->city_id      =    $city_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->makeShopConnections($this->shop_id, $this->category_id, $this->city_id);
    }

     public function makeShopConnections($shop_id, $category_id, $city_id)
      {
        //Find every shop in the category and city .
        //Connect it to the shop.

        $_shops = DB::select('select id from my_shops where category_id = '.$category_id.' and city_id = '.$city_id);

        //Find the siblings of shops' category.
        //Connect with only those category.
        //Maintain the male-female constraint.
        


        if(count($_shops) > 0){
           foreach ($_shops as $_shop) {
            if($_shop->id != $shop_id ){
              ShopToShopConnections::create([
                                              "connector_shop_id" => $shop_id,
                                              "connected_shop_id" => $_shop->id
                                            ]);
            }
          }

          return 0;

        }
       
        return 0;

      }
}
