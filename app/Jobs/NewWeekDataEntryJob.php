<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\MyShop;
use App\Library\DataModelOfShop;
use App\ShopDataPerWeek;

class NewWeekDataEntryJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $shop;
    public function __construct(MyShop $shop)
    {
        $this->shop = $shop;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $shop_data = new DataModelOfShop($this->shop);

        $revenue_last_week = $shop_data->getRevenue();
        $total_investments = $shop_data->totalInvestment();
        $total_stock_price = $shop_data->getStockPrice();
        $number_of_sold_products = $shop_data->soldProducts();
        $avg_vistors_each_day = $shop_data->avgVisitors();
        $total_template_shared = 0;
        $customer_visit_last_week = $shop_data->customerVisit();
        $number_of_interested_investors = $shop_data->interestedInvestors();
        $expected_revenue_this_week = $shop_data->expectedRevenue();
        $can_invest_indivisually = $shop_data->canInvestIndivisually();
        $sequrity_money = $shop_data->sequrityMoney();
        $recovery_from_last_week = $shop_data->recoverdAmmount();
        $ammount_to_covalent = $shop_data->ammountToCovalent();
        



        return ShopDataPerWeek::create(['revenue_last_week'  => $revenue_last_week,
                                         'total_investments' => $total_investments,
                                         'total_stock_price' => $total_stock_price,
                                         'my_shop_id'           => $this->shop->id,
                                         'order_card_id'     => 0,
                                         'payment_id'        => 0,
                                         'number_of_sold_products' => $number_of_sold_products,
                                         'avg_vistors_each_day' => $avg_vistors_each_day,
                                         'total_template_shared'=> $total_template_shared,
                                         'customer_visit_last_week' => $customer_visit_last_week,
                                         'number_of_interested_investors' => $number_of_interested_investors,
                                         'profit_last_week'    => $expected_revenue_this_week,
                                         'expected_revenue_this_week' => $expected_revenue_this_week,
                                         'can_invest_indivisually'  => $can_invest_indivisually,
                                         'sequrity_money'       => $sequrity_money,
                                         'recovery_from_last_week' => $recovery_from_last_week,
                                         'ammount_to_covalent'     => $ammount_to_covalent,
                                         'recovery_code' => str_random(4).time()

                                        ]);
    }
}
