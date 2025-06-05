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
        Schema::create('bidang_mahasiswa', function (Blueprint $table) {
            $table->id('id_bidang_mahasiswa');
            $table->unsignedBigInteger('id_preferensi_lomba')->index();
            $table->unsignedBigInteger('id_bidang');
            $table->timestamps();

            $table->foreign('id_preferensi_lomba')->references('id_preferensi_lomba')->on('preferensi_lomba')->onDelete('cascade');
            $table->foreign('id_bidang')->references('id_bidang')->on('c_bidang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bidang_mahasiswa_models');
    }
};
