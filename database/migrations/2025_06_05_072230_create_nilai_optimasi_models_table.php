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
            $table->id('id_matriks');
            $table->unsignedBigInteger('id_mahasiswa')->index();
            $table->unsignedBigInteger('id_lomba')->index();
            $table->decimal('nilai_optimasi', 10, 5)->default(0.00000)->nullable();
            $table->timestamps();

            //foreign keys
            $table->foreign('id_mahasiswa')
                ->references('id_mahasiswa')
                ->on('mahasiswa')
                ->onDelete('cascade');
            $table->foreign('id_lomba')
                ->references('id_lomba')
                ->on('c_lomba')
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
