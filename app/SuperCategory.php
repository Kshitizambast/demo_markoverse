<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Laravel\Scout\Searchable;

class SuperCategory extends Model
{
    
     use Searchable;

    
    public function categories()
    {
    	return $this->hasMany(Category::class);
    }

    public function si_unit()
    {
    	return $this->hasMany(SIUnitOfProducts::class);
    }

    public function cards()
    {
    	return $this->hasMany(Card::class);
    }

    public static function getCatName($cat_id)
    {
        $cat = DB::select('select * from super_categories where id = '.$cat_id);
        return $cat[0]->category_name;
    }
    
}
