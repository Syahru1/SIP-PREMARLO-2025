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
        Schema::create('c_penyelenggara', function (Blueprint $table) {
            $table->id('id_penyelenggara');
            $table->string('kode_penyelenggara')->unique();
            $table->string('nama_penyelenggara');
            $table->integer('skor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_penyelenggara');
    }
};
