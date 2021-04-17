<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefeeralGifts extends Model
{
    use HasFactory;

    protected $fillable = ['coupon_id', 'event_id', 'refeeral_id'];
}
