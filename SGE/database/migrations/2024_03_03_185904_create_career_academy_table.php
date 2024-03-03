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
        Schema::create('career_academy', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('career_id')->nullable()->index('career_id');
            $table->integer('academy_id')->nullable()->index('academy_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('career_academy');
    }
};
