<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplyCard extends Model
{

	
    //Check For Price Range Of Product
    public function isCardApplyable($product_price, $cards_min_range, $card_max_range)
    {
    	if($product_price >= $card_max_range or $product_price <= $card_max_range)
    		return true;
    	return false;
    }



    //Apply Card To Product
    public function applyCardToProduct($product_price, $cards_min_range, $card_max_range, $card_disscount)
    {
    	if($this->isCardApplyable($product_price, $cards_min_range, $card_max_range)){


    		$applyDisscount = ($product_price * $card_disscount) / 100;
    		$new_price = $product_price - $applyDisscount;

    		return $new_price;
    	}
    }
}
