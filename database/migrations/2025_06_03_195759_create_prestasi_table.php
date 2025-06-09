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
        Schema::create('prestasi', function (Blueprint $table) {
            $table->id('id_prestasi');
            $table->unsignedBigInteger('id_mahasiswa')->index();
            $table->unsignedBigInteger('id_prodi')->index();
            $table->string('nama_kompetisi');
            $table->enum('posisi', ['Ketua', 'Anggota'])->default('Anggota');
            $table->enum('tingkat_kompetisi', ['Regional','Nasional', 'Internasional'])->default('Nasional');
            $table->enum('juara_kompetisi', ['Juara 1', 'Juara 2', 'Juara 3'])->default('Juara 1');
            $table->enum('jenis_prestasi', ['Sains', 'Olahraga', 'Lain-lain'])->default('Sains');
            $table->string('lokasi_kompetisi');
            $table->date('tanggal_surat_tugas');
            $table->date('tanggal_kompetisi');
            $table->unsignedBigInteger('id_dosen')->index();
            $table->unsignedBigInteger('id_periode')->index();
            $table->integer('jumlah_univ');
            $table->string('nomor_sertifikat');
            $table->string('foto_sertifikat');
            $table->string('link_perlombaan');
            $table->enum('status', ['Belum Diverifikasi', 'Sudah Diverifikasi', 'Ditolak'])->default('Belum Diverifikasi');
            $table->integer('skor')->nullable();
            $table->string('catatan')->nullable();
            $table->timestamp('tanggal_pengajuan')->useCurrent();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('id_mahasiswa')
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

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasi');
    }
};
