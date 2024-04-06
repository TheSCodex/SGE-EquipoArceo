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
        Schema::disableForeignKeyConstraints();
        Schema::create('interns', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('user_id')->nullable()->index('user_id');
            $table->integer('academic_advisor_id')->nullable()->index('academic_advisor_id');
            $table->integer('business_advisor_id')->nullable()->index('business_advisor_id');
            $table->integer('project_id')->nullable()->index('project_id');
            $table->integer('book_id')->nullable()->index('book_id');
            $table->integer('penalty_id')->nullable()->index('penalty_id');
            $table->integer('student_status_id')->nullable()->index('student_status_id');
            $table->string('period')->nullable();
            $table->integer('service_hour')->nullable();
            $table->integer('career_id')->nullable()->index('career_id');
            $table->timestamps();

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
