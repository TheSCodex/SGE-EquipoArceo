<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessAdvisor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'companie_id',
        'position'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'companie_id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'adviser_id');
    }
}
