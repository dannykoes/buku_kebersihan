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
        if (!Schema::hasColumn('users', 'jabatan_id')) {
            Schema::table('users', function (Blueprint $table) {
                $table->integer('jabatan_id')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('users', 'jabatan_id')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('jabatan_id');
            });
        }
    }
};
