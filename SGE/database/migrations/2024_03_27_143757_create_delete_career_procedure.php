<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateDeleteCareerProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
        
        CREATE PROCEDURE proc_delete_career(IN _id INT)
        BEGIN
            DECLARE done INT DEFAULT FALSE;
            START TRANSACTION;
            
            UPDATE academic_advisor SET career_id = NULL WHERE career_id = _id;
            UPDATE interns SET career_id = NULL WHERE career_id = _id;
            DELETE FROM careers WHERE id = _id;
            
            COMMIT;
            SELECT 'Operations completed successfully' AS Result;
        END; 
        
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("
            DROP PROCEDURE IF EXISTS proc_delete_career;
        ");
    }
}
