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
        Schema::table('business_advisors', function (Blueprint $table) {
            $table->foreign(['companie_id'], 'business_advisors_ibfk_1')->references(['id'])->on('companies')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('business_advisors', function (Blueprint $table) {
            $table->dropForeign('business_advisors_ibfk_1');
        });
    }
};
