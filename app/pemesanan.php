<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pemesanan extends Model
{
    protected $table = 'pemesanans';
    protected $guarded = ['id'];

    public function kmr()
    {
        //fix
        // return $this->belongsTo(kamar::class, 'id_kamar');

        // return $this->belongsToMany('App\kamar')
        //     ->join('kategori', 'kategoris.id', '=', 'kamars.id_kategori');


        return $this->belongsTo(kamar::class, 'id_kamar')
            ->join(kategori::class, 'id_kategori');
        // ->join('kategoris', 'kategoris.id', '=', 'kamars.id_kategori')
        // ->select('*');;

        // return $this->belongsTo(kategori::class, 'id_kategori');
    }
    public function pemesanan()

    {
        return $this->belongsTo(kamar::class, 'id_kamar')
            ->rightjoin('kategoris', 'kamars.id_kategori', '=', 'kategoris.id');


        // fix 3
        // return $this->belongsTo(pemesanan::class, 'id')
        //     // ->join(kategori::class, 'id_kategori');
        //     ->join('kamars', 'kamars.id', '=', 'pemesanans.id_kamar')
        //     ->join('kategoris', 'kategoris.id', '=', 'kamars.id_kategori')
        //     ->select('*');


        // return $this->belongsToMany('App\pemesanan', 'id_kamar')
        //     ->join('kamars', 'kamars.id', '=', 'pemesanans.id_kamar')
        //     ->where('pemesanans.id_kamar', '=', 'kamars.id');

        // fix2
        // return $this->hasMany('App\pemesanan', 'id_kamar')
        //     ->join('kamars', 'kamars.id', '=', 'pemesanans.id_kamar')
        //     ->join('kategoris', 'kategoris.id', '=', 'kamars.id_kategori')
        //     // ->where('pemesanans.id_kamar', '=', 'kamars.id')
        //     // ->where('pemesanans.id_kamar', '=', 'kamars.id')
        //     ->select('*');

        // return $this->hasMany('App\kamar', 'id')
        //     ->join('pemesanans', 'kamars.id', '=', 'pemesanans.id_kamar')
        //     ->select('*');

        // ->join('pemesanans', 'pemesanans.id_kamar', '=', 'kamars.id')
    }

    // public function ktg()
    // {
    //     return $this->belongsTo(kategori::class, 'id_kamar');
    // }
}

// class kmr extends Model
// {
//     public function us()
//     {
//         return $this->belongsTo(kamar::class);
//     }
// }