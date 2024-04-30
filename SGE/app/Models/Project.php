<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
        'like',
        'dislike',
        'start_date',
        'end_date',
        'adviser_id',
        'internship_type_id',
        'problem_statement',
        'project_justificaction',
        'activities_to_do'
    ];

    public function adviser()
    {
        return $this->belongsTo(BusinessAdvisor::class, 'adviser_id', 'id');
    }

    public function internshipType()
    {
        return $this->belongsTo(InternshipType::class, 'internship_type_id');
    }

    public function interns()
    {
        return $this->hasMany(Intern::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function advisorLikes()
    {
        return $this->hasMany(ProjectAdvisorsLikes::class, 'id_projects');
    }
   
}
