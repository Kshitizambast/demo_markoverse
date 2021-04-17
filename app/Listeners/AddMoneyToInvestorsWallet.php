<?php

namespace App\Listeners;

use App\Events\ShopPaidCovalent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\ShopDataPerWeek;
use App\Investment;
use DB;


class AddMoneyToInvestorsWallet
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
     * @param  ShopPaidCovalent  $event
     * @return void
     */
    public function handle(ShopPaidCovalent $event)
    {
       
        $shop_data  =  ShopDataPerWeek::where('my_shop_id', 1)
                                        ->where('payment_id', 0)
                                        ->get();
                                        
        //Get The Investment
        $investments = DB::select('select * from investment_commerces where shop_id = '.$event->shop->id);

        foreach ($investments as $investment) {
            $investSql = Investment::where('is_active', 1)
                                    ->where('id', $investment->id)
                                    ->get();
            if(count($investSql) > 0){
                $this->addToWallet($investSql[0]->investor_id, $shop_data[0]->can_invest_indivisually, $investSql[0]->invested_ammount);
                Investment::where('is_active', 1)
                            ->where('id', $investment->id)
                            ->update(['earned_ammount' => $shop_data[0]->can_invest_indivisually,
                                     'is_active' => 0]);
            }
            

           
            
        }
    }

     public function addToWallet($investor_id, $earned_ammount, $invested_ammount)
    {
        return DB::update('update investment_wallets set investors_earnings =  investors_earnings + '.$earned_ammount.', payble_ammount = payble_ammount + '.$earned_ammount.', total_invested = total_invested - '.$invested_ammount.' where investor_id = '.$investor_id);
    }
}
