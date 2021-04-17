<?php

namespace App\Listeners;

use App\Events\ShopRunOutOfDays;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\ShopDataPerWeek;
use DB;

class UpdateShopWeeklyData
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
     * @param  ShopRunOutOfDays  $event
     * @return void
     */
    public function handle(ShopRunOutOfDays $event)
    {

        return ShopDataPerWeek::create(['revenue_last_week'  => $total_revenue,
                                         'total_investments' => $total_investments,
                                         'total_stock_price' => $total_investments,
                                         'shop_id'           => $event->shop->id,
                                         'order_card_id'     => 1,
                                         'payment_id'        => 0,
                                         'number_of_sold_products' => 2300,
                                         'avg_vistors_each_day' => 200,
                                         'total_template_shared'=> 300,
                                         'customer_visit_last_week' => 50,
                                         'number_of_interested_investors' => 67,
                                         'profit_last_week'    => $profit,
                                         'expected_revenue_this_week' => 785,
                                         'can_invest_indivisually'  => $stock_price_per_investment,
                                         'sequrity_money'       => 50,
                                         'recovery_from_last_week' => 900,
                                         'ammount_to_covalent'     => 5000

                                        ]);

    }


    // public function getEverySoldProductOfShop($shop)
    // {
    //     $shop_data = DB::select('select * from daily_sells where shop_id = '.$shop->id);


    //     return $shop_data;
    // }

    // public function revenueThisWeek($shop)
    // {
    //     $sells_data = DB::select('select * from daily_sells where shop_id = '.$shop->id.' and fullfilled = 1');;
    //     $total_revenue = array_sum($sells_data->total);
    //     return $total_revenue;
    // }

    // public function totalSoldProduct($shop)
    // {
    //     $sells_data = $this->getEverySoldProductOfShop($shop);
    //     $total_sold_product = count($sells_data->product_id);
    //     return $total_sold_product;
    // }

    // public function totalStockPrice($shop)
    // {
    //     $stock_price = ($this->revenueThisWeek($shop) * 0.1)*0.7;
    //     return $stock_price;
    // }

    // public function securityThisWeek($shop)
    // {
    //     $security = (($this->revenueThisWeek($shop) * 0.1)*0.3);
    //     return $securityThisWeek;
    // }

   



}
