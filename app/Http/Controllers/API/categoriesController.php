<?php

namespace App\Http\Controllers\API;

use App\categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class categoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index']]);
    }
    public function index()
    {
        $data = categories::with('ktg')->get();
        // $data = categories::all();
        // return response()->json($data);


        return response()->json([
            'pesan' => 'Data Tugas CRUD API 1810530121 Hana Ramdhani',
            'data' => $data
        ], 200);
    }

    public function show($id)
    {
        $data = categories::where('id', $id)->first();
        if (empty($data)) {
            return response()->json([
                'pesan' => 'Data Tidak Ada',
                'data' => ''
            ], 404);
        }
        return response()->json([
            'pesan' => 'Data Dengan ID Tersebut Berhasil Ditemukan',
            'data' => $data
        ], 200);
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            "name" => "required"
        ]);
        if ($validasi->passes()) {
            $data = categories::create($request->all());
            return response()->json([
                'pesan' => 'Data Berhasil Ditambahkan',
                'data' => $data
            ], 200);
        }
        return response()->json([
            'pesan' => 'Data Gagal Ditambahkan',
            'data' => $validasi->errors()->all()
        ], 400);
    }

    public function destroy($id)
    {
        $data = categories::where('id', $id)->first();
        if (empty($data)) {
            return response()->json([
                'pesan' => 'Data Gagal Dihapus',
                'data' => ''
            ], 404);
        }
        $data->delete();
        return response()->json([
            'pesan' => 'Data Berhasil Dihapus',
            'data' => $data
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $data = categories::where('id', $id)->first();
        if (!empty($data)) {
            $validasi = Validator::make($request->all(), [
                "name" => "required"
            ]);
            if ($validasi->passes()) {
                $data->update($request->all());
                return response()->json([
                    'pesan' => 'Data Berhasil Diubah',
                    'data' => $data
                ], 200);
            } else {
                return response()->json([
                    'pesan' => 'Data Gagal Diupdate, Isi Kolom Name',
                    'data' => $validasi->errors()->all()
                ], 404);
            }
        }
        return response()->json(['pesan' => 'Data Dengan ID Tersebut Tidak Ada'], 404);





        // $data->update($request->all());
        // return response()->json([
        //     'pesan' => 'Data Berrhasil Diupdate',
        //     'data' => $data
        // ], 200);
    }
}