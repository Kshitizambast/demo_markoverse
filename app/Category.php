<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Category extends Model
{
    //
     use Searchable;

    protected $guards = [];


    public function supercategory()
    {
    	return $this->belongsTo(SuperCategory::class);
    }

     public function shops()
    {
    	return  $this->belongsTo(Shop::class);
    } 

    public function product_category()
    {
        return $this->hasMany(ProductCategory::class);
    }
}
