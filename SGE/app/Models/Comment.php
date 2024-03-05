<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'fecha_hora',
        'status',
        'academic_advisor_id',
        'project_id',
        'parent_comment_id',
    ];

    public function academicAdvisor()
    {
        return $this->belongsTo(AcademicAdvisor::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function parentComment()
    {
        return $this->belongsTo(Comment::class, 'parent_comment_id');
    }
}

