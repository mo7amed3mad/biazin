<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officialmagazin extends Model
{
    use HasFactory;

    protected $table = "official_magazin";

    protected $fillable = 
    [
        "issue_date",
        "contribs",
        "status",
        "mag_url"
    ];
}
