<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    //
    protected $fillable = ['task_type_id','shop_id', 'product_count', 'product_count_increment'];

    public function my_shop()
    {
    	return $this->belongsTo(MyShop::class);
    }

    public function taskType()
    {
        return $this->hasMany(TaskType::class);
    }

    public function investors()
    {
    	return $this->belongsToMany(Investment::class, 'TaskToInvestor')->as('TaskToInvestor');
    }

}
