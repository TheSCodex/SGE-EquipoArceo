<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('last_doc_createds', function (Blueprint $table) {
            $table->id();
            $table->timestamps();            
            $table->integer('division_id')->nullable()->index('division_id');
            $table->unsignedInteger('number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('last_doc_createds');
    }
};
