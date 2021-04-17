<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    use HasFactory;

    protected $fillable = ['threshold_point', 'cotd_points', 'money_to_invest',  'extra_off', 'cash_back'];
	public function customers()
	{
		return $this->belongsToMany(Customer::class, 'GiftsToCustomers')->as('GiftsToCustomers');
	}


}
