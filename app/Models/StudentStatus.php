<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentStatus extends Model
{
    use HasFactory;

    protected $table = "student_status";

    protected $fillable = [
        'name',
    ];

    public function interns()
    {
        return $this->hasMany(Intern::class);
    }
}
