<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;


class LikesOfCustomers extends Model
{
     protected $fillable = [
        'customer_id', 'card_id'
    ];

    public static function alreadyLikedByCustomer($customer_id, $card_id){
		$sql = DB::select('select * from likes_of_customers where customer_id = '.$customer_id.' and card_id ='.$card_id);
		if(count($sql) > 0)
			return true;
		else
			return false;
	}


	public static function getData($card_id)
	{
		$sql = DB::select('select * from likes_of_customers where card_id = '.$card_id.' order by created_at asc');
		;
		return $sql;
	}
	public static function countLikes($card_id)
	{
		$sql = static::getData($card_id);
		return count($sql);
	}
	


	public static function firstUserToLike($card_id)
	{
		$sql = static::getData($card_id);
		if(count($sql) > 0)
			return User::findOrFail($sql[0]->customer_id)->name;
		else
			return 'become first'; 
	}

	
}
