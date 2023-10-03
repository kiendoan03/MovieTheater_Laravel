<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class director_movie extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=['director_id','movie_id'];
}
