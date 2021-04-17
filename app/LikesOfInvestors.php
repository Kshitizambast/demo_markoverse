<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class LikesOfInvestors extends Model
{
    protected $fillable = [
        'investor_id', 'card_id'
    ];

    public static function alreadyLikedByInvestor($investor_id, $card_id){
		$sql = DB::select('select * from likes_of_investors where investor_id = ' .$investor_id. ' and card_id = '.$card_id);
		if(count($sql) > 0)
			return true;
		else
			return false;
	}

	public static function countLikes($card_id)
	{
		$sql = DB::select('select * from likes_of_investors where card_id = '.$card_id);
		return count($sql);
	}
}
