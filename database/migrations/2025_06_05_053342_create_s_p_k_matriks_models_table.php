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
        Schema::create('spk_matriks', function (Blueprint $table) {
            $table->id('id_matriks');
            $table->unsignedBigInteger('id_mahasiswa')->index();
            $table->unsignedBigInteger('id_bidang')->index();
            $table->unsignedBigInteger('id_penyelenggara')->index();
            $table->unsignedBigInteger('id_biaya_pendaftaran')->index();
            $table->unsignedBigInteger('id_tingkat_kompetisi')->index();
            $table->unsignedBigInteger('id_hadiah')->index();
            $table->timestamps();

            //foreign keys
            $table->foreign('id_mahasiswa')
                ->references('id_mahasiswa')
                ->on('mahasiswa')
                ->onDelete('cascade');
            $table->foreign('id_bidang')
                ->references('id_bidang')
                ->on('c_bidang')
                ->onDelete('cascade');
            $table->foreign('id_penyelenggara')
                ->references('id_penyelenggara')
                ->on('c_penyelenggara')
                ->onDelete('cascade');
            $table->foreign('id_biaya_pendaftaran')
                ->references('id_biaya_pendaftaran')
                ->on('c_biaya_pendaftaran')
                ->onDelete('cascade');
            $table->foreign('id_tingkat_kompetisi')
                ->references('id_tingkat_kompetisi')
                ->on('c_tingkat_kompetisi')
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
        Schema::dropIfExists('s_p_k_matriks_models');
    }
};
