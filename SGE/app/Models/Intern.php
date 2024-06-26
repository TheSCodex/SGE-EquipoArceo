<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intern extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'academic_advisor_id',
        'project_id',
        'book_id',
        'student_status_id',
        'performance_area',
        'service_hour',
        'Group',
        'career_id',
        'group_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function academicAdvisor()
    {
        return $this->belongsTo(AcademicAdvisor::class, 'academic_advisor_id', 'id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function studentStatus()
    {
        return $this->belongsTo(StudentStatus::class, "student_status_id");
    }

    public function career()
    {
        return $this->hasOne(Career::class, 'id', 'career_id');
    }

    public function group()
    {
        return $this->hasOne(Group::class, 'id', 'group_id');
    }

    public function penalization()
    {
        return $this->belongsTo(penalization::class);
    }
    //Para extraer el nombre del asesor empresarial que tiene el proyecto
    public function businessAdvisor()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id')
            ->with('adviser');
    }

    public function studyGrade()
    {
        return $this->belongsTo(StudyGrade::class);
    }
}
