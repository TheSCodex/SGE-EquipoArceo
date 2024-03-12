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
        Schema::table('project', function (Blueprint $table) {
            $table->longText('problem_statement')->nullable();
            $table->longText('project_justificaction')->nullable();
            $table->longText('activities_to_do')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('project', function (Blueprint $table) {
            $table->longText('problem_statement')->nullable();
            $table->longText('project_justificaction')->nullable();
            $table->longText('activities to do')->nullable();
        });
    }
};
