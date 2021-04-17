<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\MyShop;
use App\ShopDataPerWeek;
use Illuminate\Support\Str;


class ShopFirstWeekData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

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
        


        return ShopDataPerWeek::create([
                                         'total_stock_price' => 0,
                                         'my_shop_id'        => $this->shop->id,
                                         'order_card_id'     => 0,
                                         'payment_id'        => 0,
                                         'total_template_shared'=> 0,
                                         'can_invest_indivisually'  => 0,
                                         'recovery_code' =>         Str::random(5)

                                        ]);
    }
}
