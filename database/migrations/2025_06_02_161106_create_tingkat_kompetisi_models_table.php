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
        Schema::create('c_tingkat_kompetisi', function (Blueprint $table) {
            $table->id('id_tingkat_kompetisi');
            $table->unsignedBigInteger('id_criteria')->index();
            $table->string('kode_tingkat_kompetisi')->unique();
            $table->string('nama_tingkat_kompetisi');
            $table->integer('skor');
            $table->timestamps();
            
            $table->foreign('id_criteria')->references('id_criteria')->on('criteria')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_tingkat_kompetisi');
    }
};
