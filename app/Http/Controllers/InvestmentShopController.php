<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use App\MyShop;
use App\Investment;

class InvestmentShopController extends Controller
{



	public function newInvestment(User $user, Shop $shop)
    {
       
        Investment::create([
            'investor_id' => $user->id,
            'shop_id' => $shop->id,
            'invested_ammount' => $shop->can_invest,
            'is_active' => 1
            ]);

        return back();
    }
	
     //Limit the days of one investment.
	public function investmentValidity(Shop $shop)
	{
		 $open_for_investment = DB::select('select open_for_investment from shops 								where id = '.$shop->id);

		 $number_of_investors = DB::select('select id from investments where 									shop_id= '.$shop->id);

		if(count($number_of_investors) > 5 && $open_for_investment == 1)
			DB::update('update shops set open_for_investment = 0 where id = '. $shop->id);

	}

    //Calculate the ammount given to the covalent.
    public function ammountGivenToCovalent(Shop $shop)
    {
    	$weekly_profit = DB::select('select last_week_profit from shops where id = '. $shop->id);
    	return $weekly_profit/10; 
    }

    //Divide the ammount in  parts.
    public function divideInFiveParts(Shop $shop)
    {
    	return ammountGivenToCovalent($shop) / 5;
    }
    
    //Investment must be 50% of the divided ammount.
    public function AllowedInvestmentThisWeek(Shop $shop)
    {
    	$can_invest = divideInFiveParts($shop) / 2;
    	DB::update('update shops set can_invest = '. $can_invest.' where id = '.$shop->id);
    }
}
