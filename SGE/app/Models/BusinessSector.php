<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessSector extends Model
{
     protected $table = 'business_sector';

    use HasFactory;

    protected $fillable = [
        'title',
    ];

    public function companies()
    {
        return $this->belongsTo(Company::class);
    }
}
