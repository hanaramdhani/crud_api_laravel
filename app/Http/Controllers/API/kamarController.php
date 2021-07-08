<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\kamar;
use App\kategori;

class kamarController extends Controller
{
    public function index()
    {
        // $data = kamar::all();
        $data = kamar::with('kategori')->get();
        // $data = kamar::whereHas('kategori', function ($q) {
        //     $q->where('kategoris.id', '=', 'kamars.id_kategori');
        // })->get();
        return response()->json($data);
        // return response()->json()
    }
}