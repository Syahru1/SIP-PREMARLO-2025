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
        Schema::create('criteria', function (Blueprint $table) {
            $table->id('id_criteria');
            $table->string('kode_kriteria')->unique();
            $table->string('nama_kriteria');
            $table->enum('jenis_kriteria', ['Benefit', 'Cost'])->default('benefit');
            $table->decimal('bobot_kriteria', 5, 2)->default(0.00);
            $table->timestamps();

            //foreign keys
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('criteria');
    }
};
