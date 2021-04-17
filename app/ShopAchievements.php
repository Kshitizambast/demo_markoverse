<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopAchievements extends Model
{
    use HasFactory;

   protected $fillable = ['achievement_names', 'based_on_customer_growth', 'based_on_revenue_growth', 'customer_growth', 'revenue_growth', 'super_category_id', 'badge_type'];



}
