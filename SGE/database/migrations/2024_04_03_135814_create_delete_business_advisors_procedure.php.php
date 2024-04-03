<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Llamar al procedimiento almacenado para actualizar referencias en 'interns' y eliminar el asesor de negocios
        DB::unprepared("
        DROP PROCEDURE IF EXISTS delete_business_advisor;

        CREATE PROCEDURE delete_business_advisor(IN _id INT)
        BEGIN
            DECLARE done INT DEFAULT FALSE;
            START TRANSACTION;
            
            UPDATE interns SET business_advisor_id = NULL WHERE business_advisor_id= _id;
            DELETE FROM business_advisors WHERE id = _id;
            
            COMMIT;
            SELECT 'Operations completed successfully' AS Result;
        END; 
        ");

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();

        // Eliminar el procedimiento almacenado
        DB::unprepared('DROP PROCEDURE IF EXISTS delete_business_advisor');


    }
};