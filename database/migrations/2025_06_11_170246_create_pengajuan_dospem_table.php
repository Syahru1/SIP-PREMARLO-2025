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
        Schema::create('pengajuan_dospem', function (Blueprint $table) {
            $table->id('id_pengajuan_dospem');
            $table->unsignedBigInteger('id_mahasiswa');
            $table->unsignedBigInteger('id_dosen');
            $table->unsignedBigInteger('id_tim');
            $table->string('nama_lomba');
            $table->text('deskripsi_lomba');
            $table->text('proposal');
            $table->text('catatan')->nullable(); // Catatan dari dosen pembimbing
            $table->date('tanggal_pengajuan')->default(now());
            $table->enum('status', ['Belum Diverifikasi', 'Disetujui', 'Ditolak'])->default('Belum Diverifikasi');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('id_mahasiswa')->references('id_mahasiswa')->on('mahasiswa')->onDelete('cascade');
            $table->foreign('id_dosen')->references('id_dosen')->on('dosen')->onDelete('cascade');
            $table->foreign('id_tim')->references('id_tim')->on('tim')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_dospem');
    }
};
