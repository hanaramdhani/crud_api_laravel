<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriPemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histori_pemesanans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pemesanan');
            $table->string('nama_kamar');
            $table->string('deskripsi');
            $table->integer('lama_pesan');
            $table->integer('id_kamar');
            $table->integer('total');
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
        Schema::dropIfExists('histori_pemesanans');
    }
}