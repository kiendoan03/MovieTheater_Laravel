<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['customer_name','customer_email','customer_phonenumber','customer_address','customer_username','customer_password','customer_avatar','customer_date_of_birth'];
}
