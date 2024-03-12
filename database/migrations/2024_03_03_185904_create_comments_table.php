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
        Schema::create('comments', function (Blueprint $table) {
            $table->integer('id', true);
            $table->text('content')->nullable();
            $table->timestamp('fecha_hora')->nullable()->useCurrent();
            $table->boolean('status')->nullable();
            $table->integer('academic_advisor_id')->nullable()->index('academic_advisor_id');
            $table->integer('project_id')->nullable()->index('project_id');
            $table->integer('parent_comment_id')->nullable();
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
        Schema::dropIfExists('comments');
    }
};
