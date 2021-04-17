<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestmentTask extends Model
{
    use HasFactory;

    protected $fillable = ['task_to_investor_id', 'investment_id'];

    public function investment()
    {
    	return $this->hasMany(Investment::class);
    }

    public function task_to_investor()
    {
    	return $this->hasMany(TaskToInvestor::class);
    }
}
