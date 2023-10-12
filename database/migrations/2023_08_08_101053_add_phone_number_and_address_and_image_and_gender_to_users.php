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
        Schema::table('users', function (Blueprint $table) {
            //
            $table->bigInteger('phone_number');
            $table->tinyInteger('gender');
            $table->string('image');
            $table->longText('address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('phone_number');
            $table->dropColumn('gender');
            $table->dropColumn('image');
            $table->dropColumn('address');
        });
    }
};
