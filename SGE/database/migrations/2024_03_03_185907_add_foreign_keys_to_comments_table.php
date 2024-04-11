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
        Schema::table('comments', function (Blueprint $table) {
            $table->foreign(['academic_advisor_id'], 'comments_ibfk_1')->references(['id'])->on('academic_advisor')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['project_id'], 'comments_ibfk_2')->references(['id'])->on('projects')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['interns_id'], 'comments_ibfk_3')->references(['id'])->on('interns')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['director_id'], 'comments_ibfk_4')->references(['id'])->on('users')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['president_id'], 'comments_ibfk_5')->references(['id'])->on('users')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign('comments_ibfk_1');
            $table->dropForeign('comments_ibfk_2');
        });
    }
};
