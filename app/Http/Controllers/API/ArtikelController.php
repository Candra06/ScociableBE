<?php

namespace App\Http\Controllers\API;

use App\Artikel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        $data = Artikel::all();
        if ($data) {
            return response()->json([
                'status' => true,
                'data' => $data,

            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'data' => 'Failed show artikel',

            ], 400);
        }
    }

    public function detail($id)
    {
        $data = Artikel::where('id', $id)->first();
        if ($data) {
            return response()->json([
                'status' => true,
                'data' => $data,

            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'data' => 'Failed show artikel',

            ], 400);
        }
    }
}
