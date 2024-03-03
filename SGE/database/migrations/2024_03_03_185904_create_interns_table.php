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
        Schema::create('interns', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('user_id')->nullable()->index('user_id');
            $table->integer('academic_advisor_id')->nullable()->index('academic_advisor_id');
            $table->integer('project_id')->nullable()->index('project_id');
            $table->integer('book_id')->nullable()->index('book_id');
            $table->integer('student_status_id')->nullable()->index('student_status_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interns');
    }
};
