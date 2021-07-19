<?php

namespace App\Http\Controllers\API;

use App\histori;
use App\histori_pemesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class historiPemesananController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function index()
    {
        $data = histori::all();
        // $data = DB::select("SELECT
        //     pemesanans.id,
        //     total,
        //     nama_guest,
        //     kamars.id AS kamar_id,
        //     kamars.nama_kamar,
        //     kamars.deskripsi,
        //     kategoris.id AS kategori_id,
        //     nama_kategori,
        //     harga 
        //     FROM
        //         pemesanans
        //         INNER JOIN kamars ON pemesanans.id_kamar = kamars.id
        //         INNER JOIN kategoris ON kamars.id_kategori = kategoris.id
        //     ");
        return response()->json([
            'pesan' => 'histori pemesanan tiket kapal pesiar',
            'data' => $data
        ], 200);
    }
}