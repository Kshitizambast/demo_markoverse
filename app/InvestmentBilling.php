<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestmentBilling extends Model
{
    use HasFactory;

   	protected $fillable = ['investment_id','invested_money', 'total_earned_amount', 'markoverse_cut', 'final_profit'];

   	public function investment()
   	{
   		return $this->hasOne(Investment::class);
   	}


}
