<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\kmr;
use App\pemesanan;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;

class pemesananController extends Controller
{
    public function index()
    {
        // $data = pemesanan::with('kmr')->get();
        // $data = pemesanan::with('pemesanan')->get();
        $products = pemesanan::table('pemesanans')
            ->join('kamars', 'pemesanans.id_kamar', '=', 'kamars.id')
            ->join('kategori', 'kamars.id_kategori', '=', 'kategoris.id')
            ->selectRaw('*')
            ->groupBy('products.id')
            ->get();
        return response()->json($data);


        // $data = pemesanan::with('us')
        //     ->join('kamars', 'kamars.id', '=', 'pemesanans.id_kamar')
        //     ->get();
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            "nama_kamar" => "required",
            "deskripsi" => "required",
            "lama_pesan" => "required",
            "id_kamar" => "required",
            // "total" = "required",
        ]);
        if ($validasi->passes()) {
            $data = pemesanan::create($request->all());
            return response()->json([
                "pesan" => "Pemesanan Berhasil",
                "data" => $data
            ], 200);
        }
        return response()->json([
            "pesan" => "transaksi gagal",
            "data" => $validasi->errors()->all()
        ], 404);
    }

    public function destroy($id)
    {
        $data = pemesanan::where('id', $id)->first();
        if (empty($data)) {
            return response()->json([
                "Pesan" => "Gagal Menghapus Data",
                $data => ""
            ], 400);
        }
        $data->delete();
        return response()->json([
            'pesan' => 'Guest Meninggalkan Ruangan',
            'data' => $data
        ], 200);
    }
}