<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\kamar;
use App\kategori;
use App\kategori_kamar;
use Illuminate\Support\Facades\Validator;

class kamarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index']]);
    }
    public function index()
    {
        // $data = kategori_kamar::all();
        // fix
        $data = kamar::with('kategori')->get();
        // $data = kamar::whereHas('kategori', function ($q) {
        //     $q->where('kategoris.id', '=', 'kamars.id_kategori');
        // })->get();
        return response()->json($data);
        // return response()->json()
    }

    public function show($id)
    {
        $data = kamar::where('id', $id)->first();
        if (empty($data)) {
            return response()->json([
                "pesan" => "Data Tidak Ada",
                "data" => "Kosong"
            ], 404);
        }
        return response()->json([
            "Pesan" => "Data Berhasil Ditemukan",
            "Data" => $data
        ], 200);
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            "nama_kamar" => "required",
            "deskripsi" => "required",
            "id_kategori" => "required",
            "status" => "required"
        ]);
        if ($validasi->passes()) {
            $data = kamar::create($request->all());
            return response()->json([
                "pesan" => "Tambah Kamar Berhasil",
                "data" => $data
            ], 200);
        }
        return response()->json([
            "pesan" => "Gagal menambahkan kamar",
            "data" => $validasi->errors()->all()
        ], 404);
    }

    public function update(Request $request, $id)
    {
        $data = kamar::where('id', $id)->first();
        if (!empty($data)) {
            $validasi = Validator::make($request->all(), [
                "nama_kamar" => "required",
                "deskripsi" => "required",
                "id_kategori" => "required",
                "status" => "required"
            ]);
            if ($validasi->passes()) {
                $data->update($request->all());
                return response()->json([
                    "Pesan" => "Data Kamar Berhasil Diubah",
                    "data" => $data
                ], 200);
            } else {
                return response()->json([
                    "pesan" => "Lengkapi Data!",
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
        $data = kamar::where('id', $id)->first();
        if (empty($data)) {
            return response()->json([
                "Pesan" => "Hapus Kamar Gagal",
                "Data" => ""
            ], 404);
        }
        $data->delete();
        return response()->json([
            "Pesan" => "Data Kamar Berhasil Dihapus",
            "Data" => $data
        ], 200);
    }
}