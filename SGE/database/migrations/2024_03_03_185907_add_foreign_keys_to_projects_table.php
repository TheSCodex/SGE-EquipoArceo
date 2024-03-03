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
        Schema::table('projects', function (Blueprint $table) {
            $table->foreign(['adviser_id'], 'projects_ibfk_1')->references(['id'])->on('business_advisors')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['internship_Type'], 'projects_ibfk_2')->references(['id'])->on('internship_type')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign('projects_ibfk_1');
            $table->dropForeign('projects_ibfk_2');
        });
    }
};
