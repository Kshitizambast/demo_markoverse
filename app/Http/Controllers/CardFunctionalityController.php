<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RankOfCards;
use App\MyShop;
use App\Card;

class CardFunctionalityController extends Controller
{	

    public function rank(Card $card)
    {
    	$rankOfCards = new RankOfCards;
    	$rankOfCards->store_rank($card);
    }

    public function buyCard(Card $card, MyShop $shop)
    {
    	//Do the Transaction And Done

    	//Make it unavialable to sell

    	//Queue the likes
    }


    public function makeCardAvailableForSelling(Card $card)
    {
    	
    }
}
