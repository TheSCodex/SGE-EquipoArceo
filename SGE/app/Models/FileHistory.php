<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class FileHistory extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'fileHistory';

    protected $fillable = [
        'title',
        'advisor_identifier',
        'advisor_email',
        'advisor_name',
        'advisor_lastName',
        'user_id',
        'academic_advisor_id',
        'student',
        'student_identifier',
        'student_group',
        'student_service_hours',
        'division',
        'director',
        'career',
        'project',
        'reason',
        'type',
        'interns',
        'serviceHours',
        'business_advisors',
        'docNumberCreated'
    ];

}
