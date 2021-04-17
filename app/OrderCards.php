<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderCards extends Model
{
    //

    protected $fillable = ['card_id', 'start_date', 'end_date', 'payment_id'];

    public function cards()
    {
    	return $this->belongsTo(Card::class);
    }

    public function payment()
    {
    	return $this->hasOne(Payment::class);
    }

    public function shopDataPerWeek()
    {
    	return $this->belongsTo(ShopDataPerWeek::class);
    }

}
