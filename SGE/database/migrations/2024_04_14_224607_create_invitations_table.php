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
    Schema::create('invitations', function (Blueprint $table) {
        $table->integer('id', true);
        $table->integer('project_id')->nullable()->index('project_id');
        $table->integer('user_id')->nullable()->index('user_id');
        $table->string('status')->default('pending');
        $table->timestamps();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitations');
    }
};
