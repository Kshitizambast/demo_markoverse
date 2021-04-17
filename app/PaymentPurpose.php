<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentPurpose extends Model
{
    //
    public function payment()
    {
    	return $this->hasMany(Payment::class);
    }

    
}
