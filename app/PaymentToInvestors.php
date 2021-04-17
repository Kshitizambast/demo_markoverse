<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentToInvestors extends Model
{
    protected $fillable = ['investor_id', 'send_ammount', 'upi_number', 'payment_id', 'payment_date', 'error', 'fullfilled'];

    public function investors()
    {
    	return $this->belongsTo(Investors::class);
    }

    public function payment()
    {
    	return $this->hasOne(Payment::class);
    }
}
