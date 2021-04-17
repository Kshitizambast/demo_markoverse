<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskType extends Model
{
    use HasFactory;

    protected $fillable = ['task_type'];
    public function task()
    {
    	return $this->belongsTo(Tasks::class);
    }
}
