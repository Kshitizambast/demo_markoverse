<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserImage extends Model
{
    use HasFactory;

    protected $guard = 'user';

    protected $fillable = ['user_id', 'filename'];

    public function user()
    {
    	return $this->hasOne(User::class);
    }

}
