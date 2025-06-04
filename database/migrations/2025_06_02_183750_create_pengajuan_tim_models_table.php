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
        Schema::create('pengajuan_tim', function (Blueprint $table) {
            $table->id('id_tim');
            $table->unsignedBigInteger('id_dosen');
            $table->string('nama_tim');
            $table->string('nama_kompetisi');
            $table->string('deskripsi_kompetisi')->nullable();
            $table->enum('status', ['Proses', 'Disetujui', 'Ditolak'])->default('Proses');
            $table->timestamps();

            //foreign key constraint
            $table->foreign('id_dosen')
                ->references('id_dosen')
                ->on('dosen')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_tim');
    }
};
