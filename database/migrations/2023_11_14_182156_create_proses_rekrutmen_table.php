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
        Schema::create('proses_rekrutmen', function (Blueprint $table) {
            $table->bigIncrements('ID_Lowongan');
            $table->string('posisi');
            $table->text('deskripsi_pekerjaan');
            $table->text('kualifikasi');
            $table->date('tanggal_buka');
            $table->date('tanggal_tutup');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proses_rekrutmen');
    }
};
