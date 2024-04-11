<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyGrade extends Model
{
    use HasFactory;
    protected $fillable = [
        'degree'
    ];

    public function interns()
    {
        return $this->hasOne(Intern::class, 'study_grade_id');
    }
}
