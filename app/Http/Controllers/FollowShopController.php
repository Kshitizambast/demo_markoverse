<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FollowShop;


class FollowShopController extends Controller
{
	public function follow(Request $request)
	{
		
		$validatedUserShopFollow = request()->validate([
			'user_id' => 'required',
			'shop_id' => 'required'
		]);
		FollowShop::create($validatedUserShopFollow);

		return back();
	}
}
