<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class DropCompanyProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
        DROP PROCEDURE IF EXISTS proc_delete_company;

        CREATE PROCEDURE proc_delete_company(IN _id INT)
        BEGIN
            DECLARE exit handler for sqlexception, sqlwarning
            BEGIN
                ROLLBACK;
            END;

            START TRANSACTION;

            -- Actualiza las referencias en la tabla business_advisors
            UPDATE business_advisors SET companie_id = NULL WHERE companie_id = _id;

            -- Elimina la empresa
            DELETE FROM companies WHERE id = _id;

            COMMIT;
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
        DB::unprepared("DROP PROCEDURE IF EXISTS proc_delete_company;");
    }
}
