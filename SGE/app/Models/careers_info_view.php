<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class careers_info_view extends Model
{
    use HasFactory;
    
    protected $table = 'carrera_info';
    protected $primaryKey = 'id_career'; 

    protected $fillable = [
        'id_career',
        'id_division',
        'id_academy',
        'id_president',
        'career_name',
        'division_name',
        'academy_name',
        'president_name'
    ];

    public function career()
    {
        return $this->belongsTo(Career::class);
    }

}
