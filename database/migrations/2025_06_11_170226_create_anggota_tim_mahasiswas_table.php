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
        Schema::create('anggota_tim', function (Blueprint $table) {
            $table->id('id_anggota_tim');
            $table->unsignedBigInteger('id_tim');
            $table->unsignedBigInteger('id_mahasiswa');
            $table->enum('peran', ['ketua', 'anggota'])->default('anggota'); 
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('id_tim')->references('id_tim')->on('tim')->onDelete('cascade');
            $table->foreign('id_mahasiswa')->references('id_mahasiswa')->on('mahasiswa')->onDelete('cascade');

            // Unique constraint to prevent duplicate team members
            $table->unique(['id_tim', 'id_mahasiswa'], 'unique_tim_member');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota_tim');
    }
};
