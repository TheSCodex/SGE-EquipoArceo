<?php

// ! ISRAEL: Yo lo agregue la neta no se si exita pero estuve buscando y no encontre ninguna tabla con los campos que necesito

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project_division extends Model
{
    use HasFactory;
    protected $fillable = [
        'designated_students',
        'votes_received',
        'academic_consultant',
        'publication_date',
        'status',
    ];
}
