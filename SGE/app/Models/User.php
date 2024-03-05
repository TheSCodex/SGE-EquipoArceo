<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CareerAcademy;
use App\Models\Role;
use App\Models\AcademicAdvisor;
use App\Models\Intern;
use App\Models\CalendarEvent;
use App\Models\Comment;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'identifier',
        'career_academy_id',
        'rol_id',
    ];

    public function careerAcademy()
    {
        return $this->belongsTo(CareerAcademy::class, 'career_academy_id');
    }    

    public function role()
    {
        return $this->belongsTo(Role::class, 'rol_id');
    }

    public function academicAdvisor()
    {
        return $this->hasOne(AcademicAdvisor::class, 'user_id');
    }

    public function interns()
    {
        return $this->hasOne(Intern::class, 'user_id');
    }

    public function requestedEvents()
    {
        return $this->hasMany(CalendarEvent::class, 'requester_id');
    }

    public function receivedEvents()
    {
        return $this->hasMany(CalendarEvent::class, 'receiver_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'academic_advisor_id');
    }
}
