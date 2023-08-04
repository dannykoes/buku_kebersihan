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
        if (!Schema::hasColumn('users', 'id_pegawai')) {
            Schema::table('users', function (Blueprint $table) {
                $table->String('id_pegawai')->nullable();
            });
        }
        if (!Schema::hasColumn('tugas', 'kategori')) {
            Schema::table('tugas', function (Blueprint $table) {
                $table->integer('kategori')->nullable();
            });
        }
        if (!Schema::hasColumn('tugas', 'id_pengguna')) {
            Schema::table('tugas', function (Blueprint $table) {
                $table->integer('id_pengguna')->nullable();
            });
        }
        if (!Schema::hasColumn('tugas', 'lantai_id')) {
            Schema::table('tugas', function (Blueprint $table) {
                $table->integer('lantai_id')->nullable();
            });
        }
        if (!Schema::hasColumn('tugas', 'json_additional')) {
            Schema::table('tugas', function (Blueprint $table) {
                $table->json('json_additional')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('users', 'id_pegawai')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('id_pegawai');
            });
        }
        if (Schema::hasColumn('tugas', 'kategori')) {
            Schema::table('tugas', function (Blueprint $table) {
                $table->dropColumn('kategori');
            });
        }
        if (Schema::hasColumn('tugas', 'id_pengguna')) {
            Schema::table('tugas', function (Blueprint $table) {
                $table->dropColumn('id_pengguna');
            });
        }
        if (Schema::hasColumn('tugas', 'lantai_id')) {
            Schema::table('tugas', function (Blueprint $table) {
                $table->dropColumn('lantai_id');
            });
        }
        if (Schema::hasColumn('tugas', 'json_additional')) {
            Schema::table('tugas', function (Blueprint $table) {
                $table->dropColumn('json_additional');
            });
        }
    }
};
