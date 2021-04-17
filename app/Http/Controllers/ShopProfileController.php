<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\City;
use App\MyShop;
use App\Category;
use App\SuperCategory;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use Illuminate\Validation\Rule;
use Crypt;



class ShopProfileController extends Controller
{
     public function __construct()
    {   

        $this->middleware('auth:shop');
        
    }

    
	public function updateShopData($id)
	{
		$states =   State::all();
        $cities   = City::all();

        $shop = MyShop::find($id);


        return view('sellersDashboard.shop-profile')->with(['shop' => $shop, 'states'=>$states, 'cities'=>$cities]);
	}
    
    public function updatePassword(Request $request)
    {
        $request->validate([
                'current_password' => ['required', new MatchOldPassword],
                'new_password' => 'required|string|min:6',
                'new-confirm-password' => ['same:new_password']
            ]);
            
        
        MyShop::find(auth()->user()->id)->update(['password'=>Hash::make($request->new_password)]);
        
        session()->Flash('password_message','Password has been changed');
        
        return back();
    }


    public function closeShop(Request $request)
    {

    	$_id = Crypt::decrypt($request->id);
    	$shop = MyShop::find($_id);

    	if($shop->is_open_now == 0){
    		MyShop::find($_id)->update(['is_open_now' => 1]);
    	}
    	else{
    		MyShop::find($_id)->update(['is_open_now' => 0]);
    	}


    	return 0;
    }

}
