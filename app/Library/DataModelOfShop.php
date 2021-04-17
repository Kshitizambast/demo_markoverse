<?php
namespace App\Library;

use App\MyShop;
use App\ShopDataPerWeek;
use App\DailySells;
use App\OrderDetails;

use DB;


/**
 * This Changes Every Week
 */
class DataModelOfShop 
{
	
	public $shop;

	public function __construct($shop)
	{
		$this->shop = $shop;
	}

	public function getDailySellsData()
	{
		$daily_sells = DailySells::where('my_shop_id', $this->shop->id)
					           	   ->where('fullfilled', 1)
					           	   ->get();

   	   return count($daily_sells) > 0 ? $daily_sells : array();
	}


	public function getDataOfShop()
    {
      return ShopDataPerWeek::where('my_shop_id', $this->shop->id)
                             ->where('payment_id', 0)   
                             ->get();
    }


   public function getShopActiveCard()
   {

      $data_of_shop = $this->getDataOfShop();
      $cards_of_shops = DB::table('cards')
      		->join('card_features', 'card_features.card_id', '=', 'cards.id')
            ->leftJoin('order_cards', 'cards.id', '=', 'order_cards.card_id')
            ->where('order_cards.id', '=', $data_of_shop[0]->order_cards_id)
            ->select('cards.*', 'card_features.*')
            ->get();
     
      return $cards_of_shops;
      
   }



	public function getEverySoldProduct()
	{
		//$orders = array();

		 $orders = DB::table('daily_sells')
                       ->leftJoin('order_details', 'daily_sells.id', '=', 'order_details.daily_sells_id')
                       ->where('daily_sells.my_shop_id', '=', $this->shop->id)
                       ->where('order_details.fullfilled', '=', 1)
                       ->select('order_details.*')
                       ->get();

           return $orders;
			
		
	}

	public function getRevenue()
	{
		$sells_data = $this->getDailySellsData();
		$total_revenue = 0;
		if(count($sells_data) > 0) {
		 	foreach ($sells_data as $_sells_data) {
				$total_revenue += $_sells_data->paid;
			}
		return $total_revenue;

		} else
			return 0;
		    
	}



	public function productSellComparision()
	{
		//dd($this->soldProducts());
		if (count($this->getEverySoldProduct()) > 0 and $this->soldProducts() > 0) {
			
		
		$sold_products = $this->getEverySoldProduct();
		$total_sold_prodcuts = $this->soldProducts();

		$product_sold_map = array();

		foreach ($this->shop->products as $product) {
			$count = 0;
			foreach ($sold_products as $sold_product) {
				if($product->id == $sold_product->product_id)
					$count++;
				else
					continue;
			}
			$product_sold_map[$product->id] = ceil(($count/$total_sold_prodcuts)*100);
			$count -= $count; 
		}
		

		return $product_sold_map;
	   }

	   return array();
		//['prodcut_1':60%, 'product_2':10%];
	}


	public function revenuePerMonth()
	{
		
	}


	public function totalInvestment()
	{
		return 2;
	}

	public function soldProducts()
	{
		 return count($this->getEverySoldProduct());
	}

	public function avgVisitors()
	{
		return count($this->getDailySellsData());
	}

	public function sharedTemplates()
	{
		return 5;
	}

	public function customerVisit()
	{
		return count($this->getDailySellsData());
	}

	public function interestedInvestors()
	{
		return count($this->getDailySellsData());
	}

	public function expectedRevenue()
	{
		return 0;
	}

	public function canInvestIndivisually()
	{
		return $this->getStockPrice() / 5;
	}

	public function getStockPrice()
	{
		return $this->getRevenue() * 0.05;
	}


	public function sequrityMoney()
	{
		return 0;
	}

	public function recoverdAmmount()
	{
		return 0;
	}

	public function ammountToCovalent()
	{
		return $this->getStockPrice();
	}



}
