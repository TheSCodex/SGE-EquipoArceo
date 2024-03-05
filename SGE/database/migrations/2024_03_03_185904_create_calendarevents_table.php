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
        Schema::create('calendarevents', function (Blueprint $table) {
            $table->id();
            $table->integer('requester_id')->nullable()->index('requester_id');
            $table->integer('receiver_id')->nullable()->index('receiver_id');
            $table->text('title')->nullable();
            $table->string('eventType')->nullable();
            $table->text('description')->nullable();
            $table->string('location')->nullable();
            $table->timestamp('date')->nullable();
            $table->enum('status', ['programada', 'en proceso', 'Terminada', 'cancelada'])->nullable();
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
        Schema::dropIfExists('calendarevents');
    }
};
