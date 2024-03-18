<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Role;
use App\Models\AcademicAdvisor;
use App\Models\Intern;
use App\Models\CalendarEvent;
use App\Models\Comment;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'identifier',
        'career_id',
        'rol_id',
    ];

    public function career()
    {
        return $this->belongsTo(Career::class, 'career_id');
    }    

    public function role()
    {
        return $this->belongsTo(Role::class, 'rol_id');
    }

    public function hasRole($role)
    {
        // return $this->roles->contains('title', $role);
        return $this->role && $this->role->title === $role;
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
