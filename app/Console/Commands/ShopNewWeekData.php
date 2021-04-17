<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\MyShop;
use App\ShopDataPerWeek;
use App\Library\DataModelOfShop;

class ShopNewWeekData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shop:new-week-data';

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

    protected $shop;

    public function __construct(MyShop $shop)
    {
        parent::__construct();
        $this->shop = $shop;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
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
                                         'total_investments' => 0,
                                         'total_stock_price' => 250,
                                         'my_shop_id'           => 1,
                                         'order_card_id'     => 0,
                                         'number_of_sold_products' => 0,
                                         'avg_vistors_each_day' => 0,
                                         'total_template_shared'=> 0,
                                         'customer_visit_last_week' => 0,
                                         'number_of_interested_investors' => 0,
                                         'profit_last_week'    => 0,
                                         'expected_revenue_this_week' => 0,
                                         'can_invest_indivisually'  => 50,
                                         'sequrity_money'       => 0,
                                         'recovery_from_last_week' => 0,
                                         'ammount_to_covalent'     => 0,
                                         'recovery_code' => str_random(4).time()

                                        ]);
    }
}
