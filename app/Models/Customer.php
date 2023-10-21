<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Customer extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    use HasFactory;
    protected $fillable = ['name','customer_email','customer_phonenumber','customer_address','customer_username','password','customer_avatar','customer_date_of_birth'];

}
