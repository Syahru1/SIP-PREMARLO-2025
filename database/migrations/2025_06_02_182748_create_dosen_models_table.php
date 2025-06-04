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
        Schema::create('dosen', function (Blueprint $table) {
            $table->id('id_dosen');
            $table->string('username')->unique();
            $table->string('nama_dosen');
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedBigInteger('id_role')->index();
            $table->string('foto');
            $table->timestamps();

            //foreign key constraints
            $table->foreign('id_role')
                ->references('id_role')
                ->on('role')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};
