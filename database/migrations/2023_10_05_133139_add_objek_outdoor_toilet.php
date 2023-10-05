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
        if (!Schema::hasColumn('a_object_models', 'toilet_id')) {
            Schema::table('a_object_models', function (Blueprint $table) {
                $table->json('toilet_id')->nullable();
            });
        }
        if (!Schema::hasColumn('a_object_models', 'outdoor_id')) {
            Schema::table('a_object_models', function (Blueprint $table) {
                $table->json('outdoor_id')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('a_object_models', 'toilet_id')) {
            Schema::table('a_object_models', function (Blueprint $table) {
                $table->dropColumn('toilet_id');
            });
        }
        if (Schema::hasColumn('a_object_models', 'outdoor_id')) {
            Schema::table('a_object_models', function (Blueprint $table) {
                $table->dropColumn('outdoor_id');
            });
        }
    }
};
