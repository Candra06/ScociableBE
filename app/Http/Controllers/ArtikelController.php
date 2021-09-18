<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index(){
        return view('dashboard.artikel.index');
    }

    public function tambah(){
        return view('dashboard.artikel.tambah');

    }
}
