<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogSection extends Model
{
    protected $fillable = ['title', 'category_id', 'user_id', 'blogs', 'thumbnail_url'];


}
