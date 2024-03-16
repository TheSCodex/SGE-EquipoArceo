<?php

// ! ISRAEL: Yo lo agregue la neta no se si exita pero estuve buscando y no encontre ninguna tabla con los campos que necesito

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
        Schema::create('project_divisions', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('designated_students')->nullable();
            $table->integer('votes_received')->nullable();
            $table->string('academic_consultant')->nullable();
            $table->string('publication_date')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
