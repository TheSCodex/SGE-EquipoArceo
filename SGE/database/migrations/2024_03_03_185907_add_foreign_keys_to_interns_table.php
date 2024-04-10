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
        Schema::table('interns', function (Blueprint $table) {
            $table->foreign(['user_id'], 'interns_ibfk_1')->references(['id'])->on('users')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['academic_advisor_id'], 'interns_ibfk_2')->references(['id'])->on('academic_advisor')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['business_advisor_id'], 'interns_ibfk_3')->references(['id'])->on('business_advisors')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['project_id'], 'interns_ibfk_4')->references(['id'])->on('projects')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['book_id'], 'interns_ibfk_5')->references(['id'])->on('books')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['penalty_id'], 'interns_ibfk_6')->references(['id'])->on('penalizations')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['student_status_id'], 'interns_ibfk_7')->references(['id'])->on('student_status')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['career_id'], 'interns_ibfk_8')->references(['id'])->on('careers')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['study_grade_id'], 'interns_ibfk_9')->references(['id'])->on('study_grades')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('interns', function (Blueprint $table) {
            $table->dropForeign('interns_ibfk_1');
            $table->dropForeign('interns_ibfk_2');
            $table->dropForeign('interns_ibfk_3');
            $table->dropForeign('interns_ibfk_4');
            $table->dropForeign('interns_ibfk_5');
            $table->dropForeign('interns_ibfk_6');
            $table->dropForeign('interns_ibfk_7');
            $table->dropForeign('interns_ibfk_8');
            $table->dropForeign('interns_ibfk_9');
        });
    }
};
