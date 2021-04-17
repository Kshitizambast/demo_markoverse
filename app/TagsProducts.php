<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagsProducts extends Model
{
    protected $fillable = ['tags_to_search_id', 'product_id'];
}
