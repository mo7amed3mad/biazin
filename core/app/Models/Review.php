<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable =
    [
        "source",
        "source_type",
        "target",
        "target_type",
        "rating",
        "comment"
    ];
}
