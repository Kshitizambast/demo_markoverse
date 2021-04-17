<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewProduct extends Model
{
    protected $fillable = ['user_id', 'product_id', 'review_points', 'comment'];

    public function products()
    {
    	return $this->belongsTo(Product::class);
    }

    public function users()
    {
    	return $this->belongsTo(User::class);
    }
}
