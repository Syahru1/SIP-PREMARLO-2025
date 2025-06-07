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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id('id_mahasiswa');
            $table->unsignedBigInteger('id_role')->index();
            $table->unsignedBigInteger('id_prodi')->index();
            $table->unsignedBigInteger('id_periode')->index();
            $table->string('username')->unique();
            $table->string('nama');
            $table->string('password');
            $table->string('foto');
            $table->timestamps();

            //foreign key constraints
            $table->foreign('id_role')
                ->references('id_role')
                ->on('role')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('id_prodi')
                ->references('id_prodi')
                ->on('prodi')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('id_periode')
                ->references('id_periode')
                ->on('periode')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
