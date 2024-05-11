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
        Schema::table('vision_settings', function (Blueprint $table) {
            //
            $table->longText('motto')->default(null)->nullable();
            $table->text('url')->default(null)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vision_settings', function (Blueprint $table) {
            //
            $table->dropColumn('motto');
            $table->dropColumn('url');
        });
    }
};
