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
        Schema::create('spk_normalisasi', function (Blueprint $table) {
            $table->id('id_normalisasi');
            $table->unsignedBigInteger('id_matriks')->index();
            $table->unsignedBigInteger('id_mahasiswa')->index();
            $table->unsignedBigInteger('id_bidang')->index();
            $table->unsignedBigInteger('id_penyelenggara')->index();
            $table->unsignedBigInteger('id_biaya_pendaftaran')->index();
            $table->unsignedBigInteger('id_tingkat_kompetisi')->index();
            $table->unsignedBigInteger('id_hadiah')->index();
            $table->timestamps();

            //foreign keys
            $table->foreign('id_matriks')
                ->references('id_matriks')
                ->on('spk_matriks')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('id_mahasiswa')
                ->references('id_mahasiswa')
                ->on('mahasiswa')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('id_bidang')
                ->references('id_bidang')
                ->on('spk_matriks')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('id_penyelenggara')
                ->references('id_penyelenggara')
                ->on('spk_matriks')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('id_biaya_pendaftaran')
                ->references('id_biaya_pendaftaran')
                ->on('spk_matriks')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('id_tingkat_kompetisi')
                ->references('id_tingkat_kompetisi')
                ->on('spk_matriks')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('id_hadiah')
                ->references('id_hadiah')
                ->on('spk_matriks')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('s_p_k_normalisasis');
    }
};
