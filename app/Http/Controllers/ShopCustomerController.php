<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopCustomerController extends Controller
{
    //
    public function __constructor()
    {	
		$this->middleware('auth');
    	$this->middleware('auth:shop');
    }


    // public function addToCustomerBag(Customer, Product, Shop, Quantity)
    // {
        
    // }

    public function removeFromCustomerBag()
    {

    }


    public function dealDone()
    {

    }



}
