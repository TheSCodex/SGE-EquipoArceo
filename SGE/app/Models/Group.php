<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'career_id',
    ];

    public function career()
    {
        return $this->belongsTo(Career::class, 'career_id', 'id');
    }

}
