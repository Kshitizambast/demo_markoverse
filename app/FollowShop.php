<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use DB;
use App\MyShop;

class FollowShop extends Model
{
    protected $fillable = [
        'user_id', 'shop_id'
    ];

   public static function alreadySubscribed($user_id, $shop_id){
        $sql = DB::select('select * from follow_shops where user_id = '.$user_id.' and shop_id ='.$shop_id);
        if(count($sql) >= 1)
            return true;
        else
            return false;
    }

    
}
