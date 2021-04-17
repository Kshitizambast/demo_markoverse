<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardFeature extends Model
{
    //

     protected $fillable = ['card_id','start_point_booster', 'last_point_booster','super_category_id','frequency', 'rank_this_week', 'expected_customer_growth', 'expected_margin_cut'];
    public function cards()
    {
        return $this->belongsTo(Card::class);
    }
}
