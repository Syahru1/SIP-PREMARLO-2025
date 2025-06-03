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
        Schema::dropIfExists('prestasi');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('prestasi', function (Blueprint $table) {
            $table->id('id_prestasi');
            $table->unsignedBigInteger('nama');
            $table->unsignedBigInteger('id_prodi')->index();
            $table->string('nama_kompetisi');
            $table->enum('posisi', ['Ketua', 'Anggota'])->default('Anggota');
            $table->enum('tingkat_kompetisi', ['Regional','Nasional', 'Internasional'])->default('Nasional');
            $table->enum('juara_kompetisi', ['Juara 1', 'Juara 2', 'Juara 3'])->default('Juara 1');
            $table->string('lokasi_kompetisi');
            $table->date('tanggal-surat_tugas');
            $table->date('tanggal_kompetisi');
            $table->unsignedBigInteger('id_dosen')->index();
            $table->unsignedBigInteger('id_periode')->index();
            $table->integer('jumlah_univ');
            $table->string('nomor_sertifikat');
            $table->string('foto_sertifikat');
            $table->string('link_perlombaan');
            $table->enum('status', ['Proses', 'Disetujui', 'Ditolak'])->default('Proses');
            $table->timestamp('tanggal_pengajuan')->useCurrent();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('nama')
                ->references('id_mahasiswa')
                ->on('mahasiswa')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('id_prodi')
                ->references('id_prodi')
                ->on('prodi')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('id_dosen')
                ->references('id_dosen')
                ->on('dosen')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('id_periode')
                ->references('id_periode')
                ->on('periode')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }
};
