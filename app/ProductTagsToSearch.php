<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTagsToSearch extends Model
{
 
 protected $fillable = ['tags_to_search_id', 'product_id'];   
}
