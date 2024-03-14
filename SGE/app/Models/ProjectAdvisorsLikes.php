<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectAdvisorsLikes extends Model
{
    use HasFactory;

    protected $fillable = [
        "id_projects",
        "id_academic_advisor"
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'id_projects');
    }

    public function academicAdvisor()
    {
        return $this->belongsTo(AcademicAdvisor::class, 'id_academic_advisor');
    }
}
