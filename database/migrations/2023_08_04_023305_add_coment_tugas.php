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
        if (!Schema::hasColumn('tugas', 'komentar')) {
            Schema::table('tugas', function (Blueprint $table) {
                $table->text('komentar')->nullable();
            });
        }
        if (!Schema::hasColumn('tugas', 'nilai')) {
            Schema::table('tugas', function (Blueprint $table) {
                $table->double('nilai')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('tugas', 'komentar')) {
            Schema::table('tugas', function (Blueprint $table) {
                $table->dropColumn('komentar');
            });
        }
        if (Schema::hasColumn('tugas', 'nilai')) {
            Schema::table('tugas', function (Blueprint $table) {
                $table->dropColumn('nilai');
            });
        }
    }
};
