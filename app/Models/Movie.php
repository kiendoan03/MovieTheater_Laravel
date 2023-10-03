<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['movie_name','rating','description','poster_img','thumbnail_img','language','length','release_date','trailer','age','logo_img'];
}
