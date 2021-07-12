<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class TriggersHistoriPemesanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER add_history AFTER DELETE ON pemesanans FOR EACH ROW
        BEGIN
                INSERT INTO histori_pemesanans ( id_pemesanan, nama_kamar, deskripsi, lama_pesan, id_kamar, total, nama_guest )
            VALUES
                (
                    OLD.id,
                    OLD.nama_kamar,
                    OLD.deskripsi,
                    OLD.lama_pesan,
                    OLD.id_kamar,
                    OLD.total,
                    OLD.nama_guest 
                );
        END
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