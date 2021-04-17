<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersPerEventScore extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'total_score', 'winning_index'];
}
