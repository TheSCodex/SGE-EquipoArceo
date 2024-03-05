<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'registration_date',
        'rfc',
        'business_sector_id',
    ];

    public function businessSector()
    {
        return $this->belongsTo(BusinessSector::class, 'business_sector_id');
    }

    public function businessAdvisors()
    {
        return $this->hasMany(BusinessAdvisor::class);
    }
}
