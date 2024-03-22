<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penalization extends Model
{
    use HasFactory;

    protected $fillable = [
        "penalty_name",
        "description"
    ];
}
