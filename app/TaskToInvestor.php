<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskToInvestor extends Model
{
    //
    protected $fillable = ['task_id', 'starts_on', 'ends_on', 'progress'];


}
