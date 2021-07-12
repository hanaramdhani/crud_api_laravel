<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\kmr;
use App\pemesanan;
use App\test;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class pemesananController extends Controller
{
    public function index()
    {
        // $data = pemesanan::with('kmr')->get();
        // $data = pemesanan::with('pemesanan')->get();
        // $data = test::all();
        $result = DB::select("SELECT pemesanans.id AS pemesanan_id, lama_pesan, total, nama_guest, kamar_kategori.* FROM pemesanans
            INNER JOIN(SELECT kamar.id AS id_kamar,GROUP_CONCAT(id_kategori) AS id_kategori, GROUP_CONCAT(nama_kamar) AS
            nama_kamar, GROUP_CONCAT(status) AS status, GROUP_CONCAT(kamar.deskripsi) AS deskripsi_kamar,
            GROUP_CONCAT(nama_kategori) AS nama_kategori, GROUP_CONCAT(harga) AS harga FROM
            (SELECT id,nama_kamar,deskripsi,status,id_kategori FROM kamars) kamar INNER JOIN(SELECT id, nama_kategori, harga FROM 
            kategoris) kategori ON kamar.id_kategori=kategori.id GROUP BY kamar.id) kamar_kategori ON pemesanans.id_kamar=
            kamar_kategori.id_kamar");
        if (!empty($result)) {
            $dt_nama_kamar = array();
            $dt_deskripsi = array();
            $dt_status = array();
            $dt_nama_kategori = array();
            $dt_harga = array();
            foreach ($result as $key => $value) {
                $dt_nama_kamar = explode(',', $value->nama_kamar);
                $dt_deskripsi = explode(',', $value->deskripsi_kamar);
                $dt_status = explode(',', $value->status);
                $dt_id_kategori = explode(',', $value->id_kategori);
                $dt_nama_kategori = explode(',', $value->nama_kategori);
                $dt_harga = explode(',', $value->harga);
                $data[$key]['id'] = $value->pemesanan_id;
                $data[$key]['lama_pesan'] = $value->lama_pesan;
                $data[$key]['id_kamar'] = $value->id_kamar;
                $data[$key]['total'] = $value->total;
                $data[$key]['nama_guest'] = $value->nama_guest;
                $detail = array();
                if (count($dt_nama_kamar) > 0) {
                    for ($i = 0; $i < count($dt_nama_kamar); $i++) {
                        $detail = array(
                            'nama_kamar' => $dt_nama_kamar[$i],
                            'deskripsi' => $dt_deskripsi[$i],
                            'status' => $dt_status[$i],
                            'kategori' => array(
                                'id_kategori' => $dt_id_kategori,
                                'nama_kategori' => $dt_nama_kategori[$i],
                                'harga_kamar' => $dt_harga[$i],
                            ),
                        );
                    }
                }
                $data[$key]['detail_pesanan'] = $detail;
            }
        }
        // $products = pemesanan::table('pemesanans')
        //     ->join('kamars', 'pemesanans.id_kamar', '=', 'kamars.id')
        //     ->join('kategori', 'kamars.id_kategori', '=', 'kategoris.id')
        //     ->selectRaw('*')
        //     ->groupBy('products.id')
        //     ->get();


        return response()->json($data);


        // $data = pemesanan::with('us')
        //     ->join('kamars', 'kamars.id', '=', 'pemesanans.id_kamar')
        //     ->get();
    }

    public function show($id)
    {
        $data = pemesanan::where('id', $id)->first();
        if (empty($data)) {
            return response()->json([
                "Pesan" => "Pemesanan Dengan ID Tersebut Tidak Ada",
                "Data" => "Kosong"
            ], 404);
        }
        return response()->json([
            "Pesan" => "Data Pemesanan",
            "Data" => $data
        ], 200);
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            "nama_kamar" => "required",
            "deskripsi" => "required",
            "lama_pesan" => "required",
            "id_kamar" => "required",
            "total" => "required",
            "nama_guest" => "required"
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

    public function update(Request $request, $id)
    {
        $data = pemesanan::where('id', $id)->first();
        if (!empty($data)) {
            $validasi = Validator::make($request->all(), [
            "nama_kamar" => "required",
            "deskripsi" => "required",
            "lama_pesan" => "required",
            "id_kamar" => "required",
            "total" => "required",
            "nama_guest" => "required"
            ]);
            if ($validasi->passes()) {
                $data->update($request->all());
                return response()->json([
                    "Pesan" => "Data Pemesanan Berhasil Diubah",
                    "Data" => $data
                ], 200);
            } else {
                return response()->json([
                    "Pesan" => "Data Gagal DIubah",
                    "Data" => $validasi->errors()->all()
                ], 404);
            }
        } else {
            return response()->json([
                "Pesan" => "Data Tidak Ada/ Gagal Mengubah Data",
                "Data" => "Kosong"
            ], 404);
        }   
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