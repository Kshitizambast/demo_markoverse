<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SIUnitOfProducts extends Model
{
    //
    public function products()
    {
    	return $this->hasMany(Product::class);
    }

    public function super_categories()
    {
    	return $this->belongsTo(SuperCategory::class);
    }
}
 