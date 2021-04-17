<?php

namespace App\Library;

/**
 * Find the current asset price.
 * Asset price is <500 or >500.
 * Associated class is there.
 * Based on class. We assign number o f investors.
 * We design some tasks to increase the asset price of shop.
 * Current Asset Price - Past Asset Price = Profit.
 * Repeat the process.
 */
class InvestmentModel
{
	
  public function firstAssetPrice($value_of_whole_market, $value_of_shop)
  {

  	//$value_of_whole_market is revenue the whole market generates;
  	//$value_of_shop is revenue the shop generates;

  	$price_of_one_share = $value_of_shop/$value_of_whole_market; //Price of one share, we issue 1000 shares.

  	return $value_of_shop_in_market;

  }

  public function currentAssetPrice($overall_revenue_of_market, $shop_revenue)
  {
  	
  	return $shop_revenue / $overall_revenue_of_market;
  }

  public function issuedSharePrice($total_share)
  {
  	return $this->currentAssetPrice() * $total_share;
  }

  public function assignClassToShop()
  {

  	$value_of_shop_in_market = $this->issuedSharePrice(); //1000 share assign.
  	switch ($value_of_shop_in_market) {
  		case  $value_of_shop_in_market <= 500:
  			return 'c';
  			break;

		case  $value_of_shop_in_market > 500  and  $value_of_shop_in_market < 1000:
  			return 'b';
  			break;

  		case  $value_of_shop_in_market > 1000:
  			return 'a';
  			break;
  		
  		default:
  			return 'z';
  			break;
  	}

  }  


	//Maximum Investor Shop Can have
	public function maxInvestorToShop()
	{
		$class_of_shop = 'b';
		switch ($class_of_shop) {
	  		case  $class_of_shop == 'c':
	  			return 2;
	  			break;

			case  $class_of_shop == 'b':
	  			return 3;
	  			break;

	  		case  $class_of_shop == 'a':
	  			return 5;
	  			break;

	  		default:
	  			return -1;
	  			break;
	  	}

		#based on class of shop.
		#returns the total investor count.
	}


	public function sharePricePerInvestor()
	{

		return $this->issuedSharePrice(50);

	}


	public function investorProfit($invested_amount)
	{
		return $invested_amount - $this->currentAssetPrice(); 
	}

	public function readyForNewInvestors()
	{
		return true;
	}


}