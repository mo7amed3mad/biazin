<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Celeb extends Model
{
    use HasFactory;

    protected $fillable =
    [
        "fullname",
        "email",
        "password",
        "phone",
        "image",
        "spec",
        "bio",
        "education",
        "skills",
        "experience",
        "api_token",
        "token_created",
        "otp",
        "confirmation_otp",
        "status",
        "resettime"
    ];
}