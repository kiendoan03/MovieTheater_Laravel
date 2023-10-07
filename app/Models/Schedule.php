<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'start_time',
        'end_time',
        'date',
        'movie_id',
        'room_id',
    ];
}
