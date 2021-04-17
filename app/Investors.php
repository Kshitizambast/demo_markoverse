<?php

namespace App;

use App\User;
use DB;

class investors extends User
{
    public function investment()
    {
        return $this->hasMany(Investment::class);
    }


    public function wallet()
    {
        return $this->hasOne(InvestmentWallet::class);
    }


    public static function getInvestedShop($investor_id)
    {
    		return DB::table('investment_commerces')
                           ->join('investments', 'investment_commerces.investment_id', '=', 'investments.id')
                           ->join('my_shops', 'investment_commerces.shop_id', '=', 'my_shops.id')
                           ->select('investments.*', 'my_shops.*')
                           ->where('Investments.investor_id', $investor_id)
                           ->where('investments.is_active', true)
                           ->orderBy('my_shops.created_at', 'desc')
                           ->get();
    }

    public function payment()
    {
      return $this->hasMany(PaymentToInvestors::class);
    }

    public function credit_recharge()
    {
      return $this->hasMany(CreditRecharge::class);
    }




}
