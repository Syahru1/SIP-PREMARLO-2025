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
        Schema::create('c_biaya_pendaftaran', function (Blueprint $table) {
            $table->id('id_biaya_pendaftaran');
            $table->unsignedBigInteger('id_criteria')->index();
            $table->string('kode_biaya_pendaftaran')->unique;
            $table->string('nama_biaya_pendaftaran');
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
        Schema::dropIfExists('c_biaya_pendaftaran');
    }
};
