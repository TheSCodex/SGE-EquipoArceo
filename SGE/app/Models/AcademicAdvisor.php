<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicAdvisor extends Model
{
    use HasFactory;

    protected $table = 'academic_advisor';

    protected $fillable = [
        'user_id',
        'max_advisors',
        'quantity_advised',
        'career_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likedProjects()
    {
        return $this->hasMany(ProjectAdvisorsLikes::class, 'id_academic_advisor');
    }
    
    public function event()
    {
        return $this->hasMany(CalendarEvent::class);
    }

    public function career()
    {
        return $this->hasOne(Career::class, 'id', 'career_id');
    }

}

