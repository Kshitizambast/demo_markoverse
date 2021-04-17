<?php

namespace App\Listeners;

use App\Events\InvestorInvested;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use DB;
use App\MyShop;
use App\User;
use App\Investment;
use App\InvestmentCommerce;
use App\InvestmentWallet;


class UpdateInvestmentData
{
    
    public function entryOfInvestment($shop, $investor)
    {   
        
        DB::beginTransaction();
        try {
                
                   $user_name =  User::find($investor_id)->user_name;

                   $added_string = (string) $shop->id + $investor->id;
                   

                   $investment = Investment::create([
                                                        'shop_id' => $shop->id,
                                                        'invested_ammount' => 0,
                                                        'is_active' => true,
                                                        'reference_code' => $user_name.=$added_string,
                                                 ]);

                    InvestmentCommerce::create([
                                                    'investment_id' => $investment->id,
                                                    'investor_id'   => $investor->id

                                             ]);


                    DB::update('update investment_wallets set investors_credit = investors_credit - '.MyShop::can_invest($shop->id).' where investor_id = '. auth()->user()->id);
                    DB::update('update investment_wallets set total_invested = total_invested + '.MyShop::can_invest($shop->id).' where investor_id = '. auth()->user()->id);
                    DB::update('update my_shops set maximum_investor_count = maximum_investor_count -1 where id = '.$shop->id);


                    DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
        }

            
       
    }


    public function handle(InvestorInvested $event)
    {

        $credit = DB::select('select investors_credit from investment_wallets where investor_id = '.auth()->user()->id);

    
        if($credit[0]->investors_credit >= MyShop::can_invest($event->shop->id))
            $this->entryOfInvestment($event->shop, $event->investor);
        else
            echo "fuck off";
    }
}
