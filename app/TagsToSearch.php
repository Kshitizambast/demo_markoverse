<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagsToSearch extends Model
{
    //

	protected $fillable = ['tag_name', 'super_cat_id'];

    public function product()
    {
    	return $this->belongsToMany(Product::class)->using(TagsProducts::class);
    }
}
