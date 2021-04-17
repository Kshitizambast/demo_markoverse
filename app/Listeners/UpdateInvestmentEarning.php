<?php

namespace App\Listeners;

use App\Events\ShopRunOutOfDays;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Investment;
use DB;

class UpdateInvestmentEarning
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
        return Investment::where('investor_id', 1)
                         ->update(['earned_ammount' => 200]);
    }


    public function updateEarning($shop)
    {
        //Get The Investment
        $investments = DB::select('select * from investment_commerces where shop_id = '.$shop->id);

        foreach ($investments as $investment) {
             DB::update('update investments set earned_ammount = '.$shop->can_invest_indivisually.' where id = '.$investment->id);
        }

    }

}
