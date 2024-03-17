<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



class CreateCareerInfoView extends Migration 
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW carrera_info AS
            SELECT 
                c.id AS id_career,
                d.id AS id_division,
                a.id AS id_academy,
                u.id AS id_president,
                ca.id AS id_career_academy,
                c.name AS career_name, 
                d.name AS division_name, 
                a.name AS academy_name,
                u.name as president_name
            FROM 
                careers AS c 
            JOIN 
                divisions AS d ON c.division_id = d.id
            LEFT JOIN 
                career_academy AS ca ON ca.career_id = c.id
            LEFT JOIN 
                academies AS a ON ca.academy_id = a.id
            LEFT JOIN 
                users as u on ca.id = u.career_academy_id and u.rol_id = 3;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW companiesView");
    }
}