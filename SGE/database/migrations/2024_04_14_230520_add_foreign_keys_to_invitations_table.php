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
        Schema::table('invitations', function (Blueprint $table) {
            $table->foreign(['project_id'], 'interns_ibfk_project')->references(['id'])->on('projects')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['user_id'], 'interns_ibfk_user')->references(['id'])->on('users')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invitations', function (Blueprint $table) {
            $table->dropForeign('interns_ibfk_project');
            $table->dropForeign('interns_ibfk_user');
        });
    }
};
