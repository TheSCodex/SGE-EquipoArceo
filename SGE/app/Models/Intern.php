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
        'Group'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function academicAdvisor()
    {
        return $this->hasOne(AcademicAdvisor::class, 'academic_advisor_id');
    }

    public function project()
    {
        return $this->hasOne(Project::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function studentStatus()
    {
        return $this->belongsTo(StudentStatus::class, "student_status_id");
    }

    public function event()
    {
        return $this->hasMany(CalendarEvent::class);
    }
}
