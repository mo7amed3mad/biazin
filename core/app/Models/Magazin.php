<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magazin extends Model
{
    use HasFactory;

    protected $table = "magazin";

    protected $fillable = 
    [
        "celeb_id",
        "file_url",
        "status",
    ];
}
