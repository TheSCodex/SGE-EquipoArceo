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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'identifier',
        'phoneNumber',
        'rol_id',
    ];

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

    public function president()
    {
        return $this->hasOne(Academy::class, 'president_id');
    }

    public function director()
    {
        return $this->hasOne(Academy::class, 'director_id');
    }

    public function directorAsistant()
    {
        return $this->hasOne(Academy::class, 'directorAsistant_id');
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
    // para añadir el registro cuando el rol sea de estudiantes
    // protected static function boot()
    // {
    //     parent::boot();
    //     static::created(function ($user) {
    //         // hay que convertir el id del user a int, si hay algun error por esto lo checamos 
    //         if ((int)$user->rol_id === 1) {
    //             DB::table('interns')->insert([
    //                 'user_id' => $user->id,
    //             ]);
    //         }
    //     });
      
    // }

    public function hasPermission($permission)
    {
        $permissions = json_decode($this->role->permissions, true);
        return isset($permissions[$permission]) && $permissions[$permission];
    }
    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }
}
