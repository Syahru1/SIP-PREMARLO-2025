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
        Schema::create('preferensi_bidang', function (Blueprint $table) {
            $table->id('id_preferensi_bidang');
            $table->unsignedBigInteger('id_mahasiswa')->index();
            $table->unsignedBigInteger('id_preferensi_mahasiswa')->index();
            $table->unsignedBigInteger('id_bidang')->index();

            //foreign keys
            $table->foreign('id_mahasiswa')
                ->references('id_mahasiswa')
                ->on('mahasiswa')
                ->onDelete('cascade');
            $table->foreign('id_preferensi_mahasiswa')
                ->references('id_preferensi_mahasiswa')
                ->on('preferensi_mahasiswa')
                ->onDelete('cascade');
            $table->foreign('id_bidang')
                ->references('id_bidang')
                ->on('c_bidang')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preferensi_bidang');
    }
};
