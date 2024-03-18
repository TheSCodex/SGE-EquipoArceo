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
        Schema::table('careers', function (Blueprint $table) {
            $table->foreign(['division_id'], 'careers_ibfk_1')->references(['id'])->on('divisions')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['academy_id'], 'careers_ibfk_2')->references(['id'])->on('academies')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('careers', function (Blueprint $table) {
            $table->dropForeign('careers_ibfk_1');
            $table->dropForeign('careers_ibfk_2');
        });
    }
};
