<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Artisan;
use App\Notifications\ShopResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class MyShop extends Authenticatable
{
    //
     use Notifiable;
     

     protected $guard = 'shop';

     protected $fillable = [
                             'shop_name', 'category_id', 'owner_id',  'email', 'shop_phone', 'password', 'address', 'opening_time', 'city_id','zip_or_pin', 'maximum_investor_count', 'closing_time', 'close_on', 'is_open_now', 'specialist_in', 'home_delivery_available'
                         ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = 'my_shops';
    //  // Primary Key
    public $primaryKey = 'id';
    
    // // Timestamps
    // public $timestamps = true;



    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ShopResetPasswordNotification($token));
    }

    public function receivesBroadcastNotificationsOn()
    {
        return 'users.'.$this->id;
    }
    public function shopdata()
    {
        return $this->hasMany(ShopDataPerWeek::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function tasks()
    {
        return $this->hasMany(Tasks::class);
    }

    public function cards()
    {
    	return  $this->belongsToMany(Card::class, 'CardShop')->as('CardShop');
    }

    public function landmarks()
    {
        return  $this->belongsTo(Landmark::class);
    }

    //Category Relations

     public function categories()
    {
        return  $this->hasOne(Category::class);
    } 


    public function user()
    {
        return $this->belongsToMany(User::class, 'followShop')->as('followShop');
    }


    public function investments()
    {
        return $this->belongsToMany(Investment::class, 'InvestmentCommerce')->as('InvestmentCommerce');
    }

    public function customer()
    {
        return $this->belongsToMany(Customer::class, 'DailySales')->as('DailySales');
    }


    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function images()
    {
        return $this->hasMany(ShopImages::class);
    }


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }


    public function daily_sells()
    {
        return $this->hasMany(DailySells::class);
    }


    public static function ownerName($owner_id)
    {
        $owner =    User::find($owner_id);
        return $owner->name;
    }

    public static function SuperCategoryid($category_id)
    {
        $category =  Category::find($category_id);
        return $category->super_categories_id;
    }
    
    public static function can_invest($shop_id)
    {
        $investment_data =  DB::select('select can_invest_indivisually from shop_data_per_weeks where my_shop_id = '.$shop_id.' and payment_id = 0');
        return $investment_data[0]->can_invest_indivisually;
    }

    public function test($shop)
    {
   
       return  Artisan::call('shop:new-week-data', [
                'shop' => $shop, 
            ]);
    }
}
