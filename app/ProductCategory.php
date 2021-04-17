<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{


	protected $fillable = ['shop_category_id', 'product_categories'];
    //
    public function products()
    {
    	return $this->hasMany(Product::class);
    }


    public function categories()
    {
    	return $this->belongsTo(Category::class);
    }
}
			