<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Shop;
use App\Card;

class ShopCardController extends Controller
{
  
    //SuggestCard
    //SeeTheCards
    public function seeTheCards(Card $card)
    {
   		return view('card.show')->with('card', $card);
    }


    //BuyTheCard
    public function buyCard(Shop $shop, Card $card)
    {   //If bought return true
    	return 'View of cards';
    }




    //ApplyTheCard
    public function applyCardToShop(Shop $shop, Card $card)
    {   //Set the activated for True and Deactivate For Selling

        if(buyCard($shop, $card)){
            DB::update('update cards set activated = 1 , shop_id = '.$shop->id.'where card_id = '.$card->id);
        }
    	return true;
    }

    //Pin to the products

    public function checkActivity(Card $card)
    {   
        $activated = DB::select('select activated from cards where id = '. $card->id);
        if($activated == 1) return true;

        return false;
    }



    //DeactivateTheCard
    public function deactivateCardForSelling(Card $card)
    {   
        if(checkActivity($card)){
            return 'Some Script to dissable the feature';
        }
    }

   

    public function checkForValidity(Card $card)
    {   //Check For A week And set the activated to 0 and return true
        return 'View of cards';
    }



    public function deactivateCardForShop(Card $card)
    {   if(checkActivity($card)){

           return 'Send e-mail and Notisification';
        }

    }



    //AvialableForSale
     public function makeAvialableForSell(Card $card)
    {
    	if(checkForValidity($card)){
            return 'Send to the Suggestion and manupulate the script';
        }
    }
}
