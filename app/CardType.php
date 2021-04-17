<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardType extends Model
{
    use HasFactory;

    protected $fillable = ['card_type'];

    public function cards()
    {
    	return $this->hasMany(Card::class);
    }
}
