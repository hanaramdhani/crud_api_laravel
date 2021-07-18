<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\kategori;
use Illuminate\Support\Facades\Validator;

class kategorisController extends Controller
{
    public function index()
    {
        $data = kategori::all();
        return response()->json([
            'Pesan' => 'Data Kategori Kamar Bagian Admin',
            'Data' => $data
        ], 200);
    }
    public function show($id)
    {
        $data = kategori::where('id', $id)->first();
        if (empty($data)) {
            return response()->json([
                'Pesan' => 'Data Kategori Kamar tidak ada',
                'Data' => ''
            ], 404);
        }   
        return response()->json([
            'Pesan' => 'Data Kategori Kamar Ditemukan',
            'Data' => $data
        ], 200);
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'nama_kategori' => 'required',
            'harga' => 'required',
            'maksimal_tamu' => 'required',
            'fasilitas' => 'required'
        ]);
        if ($validasi->passes()) {
            $data = kategori::create($request->all());
            return response()->json([
                "Pesan" => "Data Kategori kamar Berhasil Ditambahkan",
                "Data" => $data
            ], 200);
        } else {
            return response()->json([
                "Pesan" => "Data Kategori kamar Gagal Ditambahkan",
                "Data" => $validasi->errors()->all()
            ], 404);
        } 
    }
    public function update(Request $request, $id)
    {
        $data = kategori::where('id', $id)->first();
        if (!empty($data)) {
            $validasi = Validator::make($request->all(), [
                'nama_kategori' => 'required',
                'harga' => 'required',
                'maksimal_tamu' => 'required',
                'fasilitas' => 'required'
            ]);
            if ($validasi->passes()) {
                $data->update($request->all());
                return response()->json([
                    'Pesan' => 'Data Kategori Kamar Berhasil Diubah',
                    'Data' => $data
                ], 200);
            }
            return response()->json([
                'Pesan' => 'Gagal Diubah',
                'Data' => $validasi->errors()->all()
            ], 404);
        }
    }
    public function destroy($id)
    {
        $data = kategori::where('id', $id)->first();
        if (!empty($data)) {
            $data->delete(); 
            return response()->json([
                'Pesan' => 'Berhasil Dihapus',
                'Data' => $data
            ], 200);
        }
        
        return response()->json([
            'Pesan' => 'Gagal Dihapus',
            'Data' => ''
        ], 404);

    }
}