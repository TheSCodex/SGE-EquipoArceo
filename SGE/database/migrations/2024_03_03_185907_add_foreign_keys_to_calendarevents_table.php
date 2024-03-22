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
        Schema::table('calendarevents', function (Blueprint $table) {
            $table->foreign(['requester_id'], 'calendarevents_ibfk_1')->references(['id'])->on('academic_advisor')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['receiver_id'], 'calendarevents_ibfk_2')->references(['id'])->on('interns')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('calendarevents', function (Blueprint $table) {
            $table->dropForeign('calendarevents_ibfk_1');
            $table->dropForeign('calendarevents_ibfk_2');
        });
    }
};
