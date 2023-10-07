<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class actor_movie extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=['actor_id','movie_id'];
}
