<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateDeleteDivisionProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("

        DROP PROCEDURE IF EXISTS proc_delete_division;

        CREATE PROCEDURE proc_delete_division(IN _id INT)
        BEGIN
            DECLARE done INT DEFAULT FALSE;
            START TRANSACTION;
            
            UPDATE academies SET division_id = NULL WHERE division_id = _id;
            DELETE FROM divisions WHERE id = _id;
            
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
            DROP PROCEDURE IF EXISTS proc_delete_division;
        ");
    }
}
