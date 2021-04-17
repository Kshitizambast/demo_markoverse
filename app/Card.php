<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Card extends Model
{
    //
    protected $fillable = ['card_title', 'discount' ,'cashback','comment_id','open_for_voting', 'code',  'card_type_id',  'point_schema_id','description','min_point', 'min_spending', 'price', 'tag_id' ,'start_date', 'end_date', 'activated', ''];

    protected $table = 'cards';

    public $primary_key = 'id';

    public $timestamp = true;


    public function order_cards()
    {
    	return  $this->hasMany(OrderCards::class);
    }

    public function super_categories()
    {
        return $this->belongsTo(SuperCategory::class);
    }

   public function customer()
    {
        return $this->belongsToMany(Customer::class, 'LikesOfCustomers')->as('LikesOfCustomers');
    }

     public function investor()
    {
        return $this->belongsToMany(Investment::class, 'LikesOfInvestors')->as('LikesOfInvestors');
    }


    public function featureOfCard()
    {
        return $this->hasMany(CardFeature::class);
    }

    public static function getCard($shop_id)
    {

        $shop_data = DB::select('select order_cards_id from shop_data_per_weeks where payment_id = 0 and my_shop_id = '.$shop_id);
        if($shop_data[0]->order_cards_id != 0)
            $cards = [];
 
        else{
            $cards = DB::table('cards')
                    ->join('order_cards', 'cards.id', '=', 'order_cards.card_id')
                    ->select('cards.*')
                    ->where('order_cards.id', $shop_data[0]->order_cards_id)
                    ->get();
        }
        
        return $cards;
    }

    

   
}
