<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'academy_id',
    ];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }
    public function academy()
    {
        return $this->belongsTo(Academy::class);
    }
    public function interns()
    {
        return $this->hasMany(Intern::class);
    }
}
