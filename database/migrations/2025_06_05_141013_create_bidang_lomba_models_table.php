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
        Schema::create('bidang_lomba', function (Blueprint $table) {
        $table->id('id_bidang_lomba');
        $table->unsignedBigInteger('id_lomba');
        $table->unsignedBigInteger('id_bidang');
        $table->timestamps();

        $table->foreign('id_lomba')->references('id_lomba')->on('c_lomba')->onDelete('cascade');
        $table->foreign('id_bidang')->references('id_bidang')->on('c_bidang')->onDelete('cascade');
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bidang_lomba');
    }
};
