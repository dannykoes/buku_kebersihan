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
        Schema::create('todo_new_models', function (Blueprint $table) {
            $table->id();
            $table->integer('status');
            $table->integer('id_pegawai');
            $table->date('tanggal')->nullable();
            $table->json('tugas');
            $table->json('foto');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todo_new_models');
    }
};
