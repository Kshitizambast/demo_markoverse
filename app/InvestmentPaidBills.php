<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestmentPaidBills extends Model
{
    use HasFactory;

    protected $fillabel = ['investment_billing_id', 'requested_on', 'fullfilled'];
}
