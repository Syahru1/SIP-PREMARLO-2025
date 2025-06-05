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
        Schema::create('preferensi_lomba', function (Blueprint $table) {
            $table->id('id_preferensi_lomba');
            $table->unsignedBigInteger('id_penyelenggara')->index();
            $table->unsignedBigInteger('id_biaya_pendaftaran')->index();
            $table->unsignedBigInteger('id_tingkat_kompetisi')->index();
            $table->unsignedBigInteger('id_hadiah')->index();
            $table->timestamps();

            //foreign keys
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
        Schema::dropIfExists('preferensi_lomba');
    }
};
