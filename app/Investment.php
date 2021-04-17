<?php

namespace App;

use App\Shop;
use App\Card;
use App\Investors;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{

	protected $fillable = ['shop_id', 'invested_ammount','is_active', 'reference_code']; 
    
    public function shop()
    {
    	return $this->belongsToMany(MyShop::class, 'InvestmentCommerce')->as('InvestmentCommerce');
    }

    public function investor()
    {
        return $this->belongsTo(Investors::class);
    }


    public function task()
    {
        return $this->belongsToMany(Tasks::class, 'TaskToInvestor')->as('TaskToInvestor');
    }

    public function card()
    {
    	 return $this->belongsToMany(Card::class, 'LikesOfInvestors')->as('LikesOfInvestors');
    }

   
    
}
