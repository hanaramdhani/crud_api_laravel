<?php

namespace App\Http\Controllers\API;

use App\histori;
use App\histori_pemesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class historiPemesananController extends Controller
{
    public function index()
    {
        $data = histori::all();
        return response()->json([
            'pesan' => 'histori pemesanan tiket kapal pesiar',
            'data' => $data
        ], 200);
    }
}