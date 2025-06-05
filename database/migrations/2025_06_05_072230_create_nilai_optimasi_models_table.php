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
        Schema::create('spk_nilai_optimasi', function (Blueprint $table) {
            $table->id('id_nilai_optimasi');
            $table->unsignedBigInteger('id_bobot')->index();
            $table->unsignedBigInteger('id_mahasiswa')->index();
            $table->decimal('nilai_optimasi', 10, 5)->nullable();
            $table->timestamps();

            //foreign keys
            $table->foreign('id_bobot')
                ->references('id_bobot')
                ->on('spk_bobot')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('id_mahasiswa')
                ->references('id_mahasiswa')
                ->on('mahasiswa')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_optimasi_models');
    }
};
