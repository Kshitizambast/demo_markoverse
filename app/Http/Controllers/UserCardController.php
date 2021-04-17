<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\investors;
use App\Card;
use App\User;
use App\CardFeature;
use App\LikesOfCustomers;
use App\LikesOfInvestors;
use DB;
use App\Events\LikedByUser;
use Crypt;

class UserCardController extends Controller
{
	

    public function customerLikes(Request $request)
    {   

        $card_id = Crypt::decrypt($request->card_id);
        $customer_id =  Crypt::decrypt($request->customer_id);



        // $this->validate($request, [
        //                     $customer_id => 'required|numeric',
        //                     $card_id => 'required|numeric'

        //                 ]);

        
    	$check =  LikesOfCustomers::alreadyLikedByCustomer($customer_id, $card_id);

        $card_feature = CardFeature::where('card_id', $card_id)->get();

    	if($check == false){
    		LikesOfCustomers::create([
            'customer_id' => $customer_id,
            'card_id' => $card_id
            ]);

            DB::table('card_features')
                ->where('card_id', $card_id)
                ->increment('last_point_booster' , 1);



            $weight_this_week = $card_feature[0]->weight_this_week;
             if($weight_this_week == 4.9){
                 DB::table('card_features')
                    ->where('card_id', $card_id)
                    ->increment('weight_this_week' , 0.1);

                DB::table('cards')
                    ->where('id', $card_id)
                    ->update(['open_for_voting' => 0]);
                }
             else{

                DB::table('card_features')
                    ->where('card_id', $card_id)
                    ->increment('weight_this_week' , 0.1);
             }


            

            

                
                //event(new LikedByUser($card_id, $weight_this_week));
                
            if($weight_this_week == 5.0){
                DB::table('card')
                    ->where('id', $card_id)
                    ->update(['open_for_voting' => 0]);
                }
            
           

    	}

    	else{
    		DB::delete('delete from likes_of_customers where customer_id = ' .$customer_id. '
    			 and card_id = '.$card_id);

             DB::table('card_features')
                ->where('card_id', $card_id)
                ->decrement('last_point_booster' , 1);



            DB::table('card_features')
                ->where('card_id', $card_id)
                ->decrement('weight_this_week' , 0.1);


            
    	}

    	return back();
    	
    }


   


    public function investorLikes(investors $investor, Card $card)
    {

    	$check = LikesOfInvestors::alreadyLikedByInvestor($investor->id, $card->id);

    	if($check == false){
    		LikesOfInvestors::create([
            'investor_id' => $investor->id,
            'card_id' => $card->id
            ]);
    	}

    	else{
    		DB::delete('delete from likes_of_investors where investor_id = ' .$investor->id. ' and card_id = '.$card->id);
    	}

    	return back();
    }

    public function show()
    {
    	return view('cards.show');
    }

}

