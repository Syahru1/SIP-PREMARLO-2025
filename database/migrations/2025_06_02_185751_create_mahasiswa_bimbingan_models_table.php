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
        Schema::create('mahasiswa_bimbingan', function (Blueprint $table) {
            $table->id('id_mahasiswa_bimbingan');
            $table->unsignedBigInteger('id_dosen')->index();
            $table->unsignedBigInteger('nama_ketua')->index();
            $table->unsignedBigInteger('nama_anggota1')->index();
            $table->unsignedBigInteger('nama_anggota2')->index()->nullable();
            $table->unsignedBigInteger('nama_anggota3')->index()->nullable();
            $table->unsignedBigInteger('nama_anggota4')->index()->nullable();
            $table->unsignedBigInteger('nama_anggota5')->index()->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('id_dosen')
                ->references('id_dosen')
                ->on('dosen')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('nama_ketua')
                ->references('id_mahasiswa')
                ->on('mahasiswa')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('nama_anggota1')
                ->references('id_mahasiswa')
                ->on('mahasiswa')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('nama_anggota2')
                ->references('id_mahasiswa')
                ->on('mahasiswa')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('nama_anggota3')
                ->references('id_mahasiswa')
                ->on('mahasiswa')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('nama_anggota4')
                ->references('id_mahasiswa')
                ->on('mahasiswa')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('nama_anggota5')
                ->references('id_mahasiswa')
                ->on('mahasiswa')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unique(['nama_ketua', 'nama_anggota1', 'nama_anggota2', 'nama_anggota3', 'nama_anggota4', 'nama_anggota5'], 'unique_mahasiswa_bimbingan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa_bimbingan');
    }
};
