<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kamar extends Model
{
    protected $table = 'kamars';
    protected $guarded = ['id'];

    public function kategori()
    {
        return $this->belongsTo(kategori::class, 'id_kategori');
        // return $this->belongsToMany('App\kategori');
        // ->join('kategori', 'kategoris.id', '=', 'kamars.id_kategori');
    }
}