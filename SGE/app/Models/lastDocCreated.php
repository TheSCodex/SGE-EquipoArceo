<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lastDocCreated extends Model
{
    use HasFactory;

    protected $table = 'last_doc_createds';
    protected $fillable = [
        'number'
    ];   
}
