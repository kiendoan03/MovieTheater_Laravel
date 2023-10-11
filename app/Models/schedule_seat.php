<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedule_seat extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'schedule_id',
        'seat_id',
        'status',
    ];
}
