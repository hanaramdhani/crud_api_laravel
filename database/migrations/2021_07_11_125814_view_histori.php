<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class ViewHistori extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE VIEW histori AS SELECT
        pemesanans.id,
        total,
        nama_guest,
        kamars.id AS kamar_id,
        kamars.nama_kamar,
        kamars.deskripsi,
        kategoris.id AS kategori_id,
        nama_kategori,
        harga 
        FROM
            pemesanans
            INNER JOIN kamars ON pemesanans.id_kamar = kamars.id
            INNER JOIN kategoris ON kamars.id_kategori = kategoris.id
            
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}