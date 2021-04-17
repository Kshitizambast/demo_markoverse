<?php

namespace App;

use App\User;
use App\Shop;
/**
 * 
 */
class Owner extends User
{
	
	public function shops()
	{
		return $this->hasOne(Shop::class);
	}

	public function openShop($shop)
	{
		return $this->shops()->create($shop);
	}


}

