<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Shop;
use App\Notifications\ShopResetPasswordNotification;
use App\SalesOrder;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'ip_address', 'username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = 'users';


    public function receivesBroadcastNotificationsOn()
    {
        return 'users.'.$this->id;
    }


    public function shop()
    {
        return $this->belongsToMany(Shop::class, 'followShop')->as('followShop');
    }

    public function user_image()
    {
        return $this->hasOne(UserImage::class);
    }

    public static function image($user_id)
    {
        $image = UserImage::where('user_id', $user_id)->get();
        if(count($image) > 0)
            return $image[0]->filename;
        else
            return 0;

    }



    public function isInvestor()
    {  
        if($this->is_investor == 1 )
            return true;
        return false;
    }

    public function isCustomer()
    {  
        
        if($this->is_customer == 1 )
            return true;
        return false;
    }



    public function isAdmin()
    {  
        if($this->is_admin == 1 )
            return true;
        return false;
    }

    public function salesOrder()
    {
        return $this->hasMany(SalesOrder::class);
    }

    public function refeeral()
    {
        return $this->belongsToMany(Refeeral::class);
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }

    public static function getName($user_id)
    {
        $user = self::find($user_id);
        return $user->name;
    }
}