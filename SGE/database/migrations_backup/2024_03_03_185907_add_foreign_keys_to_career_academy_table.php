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
        Schema::table('career_academy', function (Blueprint $table) {
            $table->foreign(['career_id'], 'career_academy_ibfk_1')->references(['id'])->on('careers')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['academy_id'], 'career_academy_ibfk_2')->references(['id'])->on('academies')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('career_academy', function (Blueprint $table) {
            $table->dropForeign('career_academy_ibfk_1');
            $table->dropForeign('career_academy_ibfk_2');
        });
    }
};
