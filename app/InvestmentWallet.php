<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Investors;
use App\Payment;
use DB;


class InvestmentWallet extends Model
{
    //

    protected $fillable = ['investor_id','investors_credit', 'investors_earnings', 'payble_ammount', 'total_invested'];

    public function investors()
    {
    	return $this->belongsTo(Investors::class);
    }
    public static function credit($user_id)
    {
       	  $credit = DB::select('select investors_credit from investment_wallets where investor_id = '.$user_id);
       	  return $credit[0]->investors_credit;
    
    }

}
