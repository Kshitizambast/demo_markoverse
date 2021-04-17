<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\MyShop;

class ViewAllController extends Controller
{
    //

    public function products($category_id)
    {

    	return view('viewall.product')->with(['products' => $products]);
    }

    public function shops($category_id)
    {
    	$shops = MyShop::where('category_id', $category_id)->get();
    	return view('viewall.shops')->with(['shops' => $shops]);
    }
}
