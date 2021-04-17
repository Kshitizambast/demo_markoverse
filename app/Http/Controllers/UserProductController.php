<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReviewProduct;
use DB;

class UserProductController extends Controller
{
    public function storeReview(Request $request)
    {
    	$validatedReview = $this->validate($request, [
            'user_id'		 => 		'required|numeric',
            'product_id' 	 => 		'required|numeric',
            'review_points'  =>  		'required|numeric',
            'comment' => 'nullable|string|min:10|max:2000',
            
        ]);
        ReviewProduct::create($validatedReview);
        return back();
    }

    public function editReview($review_id)
    {

    }

    public function updateReview(Request $req)
    {
    	$validated_review = $this->validate($req, [
            'user_id'		 => 		'required|numeric',
            'product_id' 	 => 		'required|numeric',
            'review_points'  =>  		'required|numeric',
            'comment' => 'nullable|string|min:10|max:2000',
            
        ]);
        $r_id = (int)$req->input('id');

        ReviewProduct::find($r_id)
        			 ->update($validated_review);
        


          return back();
    }

    public function deleteReview(Request $req)
    {
		$id = (int)$req->input('id');
    	ReviewProduct::destroy($id);
      	return back();
    }
}
