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
        'user_id'
    ];

}
