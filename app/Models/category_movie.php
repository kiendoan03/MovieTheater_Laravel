<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category_movie extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable=['category_id','movie_id'];
}
