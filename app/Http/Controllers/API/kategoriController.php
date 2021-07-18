<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\kategori_kamar;
use App\ktgg;
use Illuminate\Support\Facades\DB;

class kategoriController extends Controller
{
    public function index()
    {
        // $data = kategori_kamar::all();
        // return response()->json($data);
        $result = DB::select(
        "SELECT
        kategoris.id AS kategori_id,
        nama_kategori,
        harga,
        COUNT( id_kategori ) AS jumlah_kamar_tersedia 
        FROM
            kamars
            INNER JOIN kategoris ON kamars.id_kategori = kategoris.id 
        WHERE
            status = 'tersedia' 
        GROUP BY
            id_kategori;"
        );
        return response()->json($result);
    }
}