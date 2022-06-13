<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable =
    [
        "email",
        "password",
        "otp",
        "resettime",
        "fullname",
        "phone",
        "address",
        "occupation"
    ];
}