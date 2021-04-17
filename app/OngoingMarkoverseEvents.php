<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OngoingMarkoverseEvents extends Model
{
    use HasFactory;
    protected $fillable = ['event_id', 'maximum_participants', 'starts_at', 'ends_at', 'total_winner'];
}
