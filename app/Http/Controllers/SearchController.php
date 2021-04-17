<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\MyShop;
use App\Product;
use App\Category;
use Crypt;
use Auth;

class SearchController extends Controller
{
    
    public function index()
    {
    	return  view('search.index');
    }

    public function search(Request $request)
    {
    	$request->validate(['webSearch' => 'required|string']);
    	//dd($request['webSearch']);
    	$shops = DB::table('my_shops')->where('shop_name','LIKE','%'.$request->webSearch."%")->get();

    	$products = DB::table('products')->where('product_name','LIKE','%'.$request->webSearch."%")->get();

    	$cards = DB::table('cards')->where('card_title','LIKE','%'.$request->webSearch."%")->get();

    	$fetchedData = array('shops' => $shops, 'products' => $products, 'cards' => $cards);

    	return response($fetchedData, 200)
                  ->header('Content-Type', 'text/plain');

    	/*{
    		MyShop, Category, Products.
			shop_name: [something],
			product_name: [something],
			price: $300,
			category: food, 
    	}*/
  //   	if($request->ajax())
		// {
		// 	$output="";

		// 	$products = DB::table('products')->where('product_name','LIKE','%'.$request->search."%")->where('is_available', '=', 1)->where('discount_price', '<>', 0)->orderBy('popularity', 'desc')->get();
		// 	if(Auth::check() and $products)
		// 	{
		// 		foreach ($products as $product) {
		// 			$output.='<a href="/product_details/login/'.Crypt::encrypt($product->id).'" class="list-group-item list-group-item-action">'.$product->product_name.'<p class="d-flex"><del> ₹ '.$product->regular_price.'</del>&nbsp;₹' .ceil($product->discount_price).'</p></a>';
		// 		}
			
		// 	}
		// 	else{
		// 		foreach ($products as $product) {
		// 			$output.='<a href="/product_details/'.Crypt::encrypt($product->id).'" class="list-group-item list-group-item-action">'.$product->product_name.'<p class="d-flex"><del> ₹ '.$product->regular_price.'</del>&nbsp;₹' .ceil($product->discount_price).'</p></a>';
		// 		}
		// 	}

		//   return Response($output);
		//     }
	 }



	public function algoliaSearch(Request $request)
	{
		$query = $request->search;

		//$search_result = MyShop::search($query)->get();
		$products = Product::search($query)->get();

		$result = $products;

		return $result;
	}
}