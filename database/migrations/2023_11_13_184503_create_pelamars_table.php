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
        Schema::create('pelamars', function (Blueprint $table) {
            $table->bigIncrements('ID_Pelamar');
            $table->string('Nama');
            $table->string('Alamat');
            $table->string('Nomor_Telepon');
            $table->string('Email');
            $table->string('Posisi_Yang_Dilamar');
            $table->text('Pengalaman_Kerja')->nullable();
            $table->text('Riwayat_Pendidikan')->nullable();
            $table->string('Skill')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelamars');
    }
};
