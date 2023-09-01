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
        if (!Schema::hasColumn('a_job_models', 'lantai_id')) {
            Schema::table('a_job_models', function (Blueprint $table) {
                $table->json('lantai_id')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('a_job_models', 'lantai_id')) {
            Schema::table('a_job_models', function (Blueprint $table) {
                $table->dropColumn('lantai_id');
            });
        }
    }
};
