<?
/**
 * Give the gifts such that every shop in area
 * (using connections). 
 *  can be pushed to the upper lvl.
 * 
 */


/*
1. Rank Of Card.---Customers & Investors.
2. Apply the card.---by Shop
3. Get the level.---- By 
4. Accroding to level>
          >> a. Numbers of referral.
          >> b. Numbers of gifts.
          >> c. 



*/

namespace App\Library;
use DB;


class GiftsFromCardToCustomer 
{
	public $customer, $shop, $card;
	
	public function __construct($customer, $shop, $card)
	{
		$customer =     $this->customer;
		$shop     =     $this->shop;
		$card     =     $this->card;
	}  



	//cutomer weight to shop
	public function getWeight()
	{
		  
	}

	//'person/day' gifts.



}