<?
/**
 * Give the gifts such that every shop in area
 * (using connections). 
 *  can be pushed to the upper lvl.
 * 
 */


/*
1. You Must Buy The Card.
2. You Must Pay for referals.

*/

namespace App\Library;
use DB;


class PricingModel 
{
	public $customer, $shop, $card;
	
	function __construct($customer, $shop, $card)
	{
		$customer = $this->customer;
		$shop =  $this->shop;
		$card = $this->card;
	}  



	//cutomer weight to shop
	public function getWeight()
	{
		
	}

	//'person/day' gifts.



}