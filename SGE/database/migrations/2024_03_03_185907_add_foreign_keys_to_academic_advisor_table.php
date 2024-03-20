<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('academic_advisor', function (Blueprint $table) {
            $table->foreign(['user_id'], 'academic_advisor_ibfk_1')->references(['id'])->on('users')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['career_id'], 'academic_advisor_ibfk_2')->references(['id'])->on('careers')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('academic_advisor', function (Blueprint $table) {
            $table->dropForeign('academic_advisor_ibfk_1');
            $table->dropForeign('academic_advisor_ibfk_2');
        });
    }
};
