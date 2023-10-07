<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['staff_name','staff_email','staff_phonenumber','staff_address','staff_username','staff_password','staff_avatar','staff_date_of_birth','staff_role'];
}
