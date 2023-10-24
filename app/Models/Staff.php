<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Staff extends Model  implements Authenticatable
{
    use HasFactory;
    use \Illuminate\Auth\Authenticatable;

    // public $timestamps = false;

    protected $fillable = ['name','staff_email','staff_phonenumber','staff_address','staff_username','password','staff_avatar','staff_date_of_birth','staff_role'];
}
