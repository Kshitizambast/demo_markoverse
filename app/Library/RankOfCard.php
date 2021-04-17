<?php

namespace App\Library;

use Illuminate\Database\Eloquent\Model;
use DB;

 
class RankOfCard
{   
   
    
    public  function store_rank($cardId)
    {   
       
        $card_data = DB::select('select * from card_features where card_id= '.$cardId->id);       
        //dd($card_data);
        //Variables
        $past_total_customers_like = $card_data[0]->past_week_total_customer_likes;
        $past_total_investors_like = $card_data[0]->past_week_total_investors_likes;

        $get_investor_like = DB::select('select investor_id from likes_of_investors where card_id='.$cardId->id);
        $get_customer_like = DB::select('select customer_id from likes_of_customers where card_id='.$cardId->id);

        $investor_like = 1 + count($get_investor_like);
        $customer_like = 1 + count($get_customer_like);



        $updateFreq = $this->update_frequency($cardId, $past_total_investors_like, $past_total_customers_like, $investor_like, $customer_like);
        $updateFreq == 0 ? $updateFreq = 1: $updateFreq =$updateFreq;
        DB::update('update cards set frequency = '.$updateFreq.' where id = '.$cardId->id);

        $getFrequency =  DB::select('select frequency from cards where id = '.$cardId->id);
        $frequency = $getFrequency[0]->frequency;

        $weight =  $this->final_rank($investor_like, $customer_like, $past_total_investors_like, $past_total_customers_like, $frequency);

       

        $new_rank_of_card =  1/$weight;

        //update Everything
        return DB::update('update card_features set weight_this_week= '.$weight.', rank_this_week = '.$new_rank_of_card.'  where card_id='.$cardId->id);
    }


    //Find the distance from zero,zero
    public function distance_from_origin($investor_like, $customer_like)
    {
        return sqrt(pow($investor_like, 2) + pow($customer_like, 2));
    }

    //perpendicular distance from c=i line
    public function distance_from_refrence_line($investor_like, $customer_like)
    {
        return abs($investor_like - $customer_like)/1.414;
    }

    //how many solution of curve of card and c=i
    public function update_frequency($cardId, $past_total_investors_like, $past_total_customers_like, $investor_like, $customer_like)
    {   
        $getFrequency = DB::select('select frequency from cards where id = '.$cardId->id);
        $frequency = 1 + $getFrequency[0]->frequency;
        $tanTheta =  $past_total_customers_like/$past_total_investors_like;
        $newTanTheta = ($customer_like)/($investor_like);
        //dd($newTanTheta);
        if($tanTheta > 1){
            if($newTanTheta <= 1)
            {
                $frequency++;
                return $frequency;
            }
            else
                return $frequency;
        }
        if($tanTheta < 1){
            if($newTanTheta >= 1){
                $frequency++;
                return $frequency;
            }
            else
                return $frequency;
        }
    }


    //Number Of Buyers
    public function number_of_buyers()
    {
        return 1;
    }
    
    //basic rank
    public function rank_of_card($investor_like, $customer_like, $past_total_investors_like, $past_total_customers_like, $frequency)
    {
        $weight = $this->distance_from_origin($investor_like, $customer_like) * $frequency * $this->number_of_buyers();
        return $weight;
    }


    //special case
     public function final_rank($investor_like, $customer_like, $past_total_investors_like, $past_total_customers_like, $frequency)
     {
        if($this->distance_from_refrence_line($investor_like, $customer_like) == 0){
            return $this->rank_of_card($investor_like, $customer_like, $past_total_investors_like, $past_total_customers_like, $frequency);
        }
        else{
            return $this->rank_of_card($investor_like, $customer_like, $past_total_investors_like, $past_total_customers_like, $frequency)/ $this->distance_from_refrence_line($investor_like, $customer_like);
        }
    }
       
}
