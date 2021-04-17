<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageUpload extends Model
{
    //

	protected $fillable = ['product_id', 'filename'];

    public function products()
    {
    	return $this->belongsTo(Product::class);
    }
}
