<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerAcademy extends Model
{
    use HasFactory;

    protected $table = 'career_academy';

    protected $fillable = [
        'career_id',
        'academy_id',
    ];

    public function career()
    {
        return $this->belongsTo(Career::class);
    }

    public function academy()
    {
        return $this->belongsTo(Academy::class);
    }
}

