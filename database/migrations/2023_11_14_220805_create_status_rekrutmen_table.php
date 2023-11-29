<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusRekrutmenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_rekrutmen', function (Blueprint $table) {
            $table->bigIncrements('ID_Proses');
            $table->unsignedBigInteger('ID_Pelamar');
            $table->foreign('ID_Pelamar')->references('ID_Pelamar')->on('pelamars')->onDelete('cascade');
            $table->unsignedBigInteger('ID_Lowongan');
            $table->foreign('ID_Lowongan')->references('ID_Lowongan')->on('proses_rekrutmen');
            $table->string('Tahap_Proses');
            $table->string('Status_Proses');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_rekrutmen');
    }
}
