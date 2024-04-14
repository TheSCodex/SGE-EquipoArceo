<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'director_id',
        'directorAsistant_id',
        'initials'
    ];

    public function academies()
    {
        return $this->hasMany(Academy::class);
    }
}
