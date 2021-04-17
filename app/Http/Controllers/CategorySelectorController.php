<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\SuperCategory;
use App\Category;
class CategorySelectorController extends Controller
{
    public function index()
    {
    	$super_categories = DB::select('select * from super_categories order by created_at');
    	return view('categoryList.index')->with('super_categories', $super_categories);
    }

    public function subcategory(SuperCategory $superCategory)
    {
        
    	$show_subcategories = DB::select('select * from categories where super_categories_id = '.$superCategory->id);

    	return view('categoryList.subcategory',
    				[
    					'show_subcategories' => $show_subcategories 
    			   ]);
        
    }
}
