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
        Schema::create('a_object_models', function (Blueprint $table) {
            $table->id();
            $table->json('kantor_id');
            $table->integer('gedung_id');
            $table->integer('lantai_id');
            $table->integer('ruangan_id')->nullable();
            $table->integer('kategori');
            $table->string('object');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('a_object_models');
    }
};
