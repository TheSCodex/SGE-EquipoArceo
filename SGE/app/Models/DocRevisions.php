<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocRevisions extends Model
{
    use HasFactory;

    protected $table = 'doc_revisions';
    protected $fillable = [
        'revision_number', 
        'revision_id'
    ];
}
