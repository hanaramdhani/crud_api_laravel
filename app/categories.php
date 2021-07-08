<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $table = 'categories';
    protected $guarded = ['id'];

    public function ktg()
    {
        return $this->belongsTo(kategori::class, 'id_kategori');
    }
}