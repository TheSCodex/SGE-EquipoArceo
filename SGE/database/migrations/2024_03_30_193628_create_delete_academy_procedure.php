<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateDeleteAcademyProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("

        DROP PROCEDURE IF EXISTS proc_delete_academy;

        CREATE PROCEDURE proc_delete_academy(IN _id INT)
        BEGIN
            DECLARE done INT DEFAULT FALSE;
            START TRANSACTION;
            
            UPDATE careers SET academy_id = NULL WHERE academy_id = _id;
            DELETE FROM academies WHERE id = _id;
            
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
            DROP PROCEDURE IF EXISTS proc_delete_academy;
        ");
    }
}
