<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class ProductController extends Controller
{


    public function best()
    {
    	$product = DB::select();
    }

    public function store(Shop $shop)
    {    
        $validatedShop = request()->validate([
            'shop_id'  => ['required' ,  'unique:shops,shop_name',  'string' , 'max:255'],
            'shop_phone' => ['required',  'numeric' , 'min:10'],
            'password'   => ['required', 'alpha_num', 'confirmed', 'min:8'],
            'description'=> ['required', 'max:2555'],
            'address'    => ['required', 'max:255d'],
            'card_id'    => ['nullable'],
            'category_id'=> ['nullable'],
            'landmark_id'=> ['nullable'],
            'comment_id' => ['nullable'],
            'city_id'    => ['nullable'],
            'number_of_shops'          => ['required', 'numeric'],  
            'current_profit'           => ['required', 'numeric'],
            'min_price_range_of_goods' => ['required', 'numeric'],
            'max_price_range_of_goods' => ['required', 'numeric'],
            'affordable_disscount'     => ['required', 'numeric', 'min:30' ,'max:100']
        ]);

        $validatedShop['password'] = bcrypt($validatedShop['password']);        
    
    $owner->openShop($validatedShop);
    
    return view('sellersDashboard.dashboard');
        
    }


    public function subscribedshop()
    {

    }


}
