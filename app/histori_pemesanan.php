<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class histori_pemesanan extends Model
{
    protected $guarded = 'histori_pemesanans';

    public function pemesanan()
    {
        return $this->belongsTo(kamar::class, 'id_kamar');
    }
}