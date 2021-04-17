<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected  $fillable = ['payment_type', 'allowed', 'payment_purpose_id', 'paid_amount'];


    public function dailySells()
    {    	
    	return $this->belongsTo(DailySells::class);
    }

    
    public function payment_purpose()
    {
    	return $this->belongsTo(PaymentPurpose::class);
    }


    public function shop_data()
    {
    	return $this->belongsTo(ShopDataPerWeek::class);
    }

    public function order_cards()
    {
    	return $this->belongsTo(OrderCards::class);
    }

    public function wallet()
    {
        return $this->belongsTo(InvestmentWallet::class);
    }

    public function paymentToInvestors()
    {
        return $this->belongsTo(InvestmentWallet::class);
    }
    
}
