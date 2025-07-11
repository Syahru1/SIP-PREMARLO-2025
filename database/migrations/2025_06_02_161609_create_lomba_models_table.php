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
        Schema::create('c_lomba', function (Blueprint $table) {
            $table->id('id_lomba');
            $table->string('kode_lomba')->unique();
            $table->string('kode_pemohon');
            $table->string('nama_lomba');
            $table->unsignedBigInteger('id_tingkat_kompetisi')->index();
            $table->unsignedBigInteger('id_penyelenggara')->index();
            $table->unsignedBigInteger('id_biaya_pendaftaran')->index();
            $table->unsignedBigInteger('id_hadiah')->index();
            $table->date('tanggal_mulai_pendaftaran');
            $table->date('tanggal_akhir_pendaftaran');
            $table->string('lokasi_lomba')->nullable();
            $table->string('link_pendaftaran');
            $table->text('deskripsi_lomba')->nullable();
            $table->enum('status_lomba', ['Masih Berlangsung', 'Selesai'])->default('Masih Berlangsung');
            $table->enum('status_verifikasi', ['Belum Diverifikasi', 'Ditolak', 'Diverifikasi']);
            $table->string('gambar_lomba');
            $table->string('catatan')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('id_tingkat_kompetisi')
                ->references('id_tingkat_kompetisi')
                ->on('c_tingkat_kompetisi')
                ->onDelete('cascade');
            $table->foreign('id_penyelenggara')
                ->references('id_penyelenggara')
                ->on('c_penyelenggara')
                ->onDelete('cascade');
            $table->foreign('id_biaya_pendaftaran')
                ->references('id_biaya_pendaftaran')
                ->on('c_biaya_pendaftaran')
                ->onDelete('cascade');
            $table->foreign('id_hadiah')
                ->references('id_hadiah')
                ->on('c_hadiah')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_lomba');
    }
};
