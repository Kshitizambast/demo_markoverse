<?php

namespace App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Product extends Model
{

    use HasFactory;
	protected $fillable = ['product_name', 's_i_unit_id', 'regular_price', 'description', 'discount_price', 'my_shop_id', 'is_card_active',  'cost_price', 'texable', 'product_category_id', 'shared_times', 'is_available'];

    public function my_shop()
    {
    	return $this->belongsTo(MyShop::class);
    }

  

   
    public function order_details()
    {
        return $this->hasMany(OrderDetails::class);
    }

    public function tags()
    {
        return $this->belongsToMany(TagsToSearch::class)->using(TagsProducts::class);
    }

    public function product_categories()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function si_unit()
    {
        return $this->belongsTo(SIUnitOfProducts::class);
    }

    public  function product_images()
    {
        return $this->hasMany(ImageUpload::class);
    }

    public static function shopName($shop_id)
    {
        $shop = DB::select('select shop_name from my_shops where id = '.$shop_id);
        return $shop[0]->shop_name;

    }

    

    public static function getFirstImage($product_id)
    {
          $image = DB::select('select filename from image_uploads where product_id = '.$product_id);
        return $image[0]->filename;
    }



    
}
