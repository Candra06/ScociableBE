<?php

namespace App\Http\Controllers;

use App\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ArtikelController extends Controller
{
    public function index(){
        $data = Artikel::all();
        return view('dashboard.artikel.index', ['artikels' => $data]);
    }

    public function tambah(){
        return view('dashboard.artikel.tambah');

    }

    public function store(Request $request){

        $fileType = $request->file('thumbnail')->extension();
        $name = Str::random(8) . '.' . $fileType;
        
        $data = [
            'title' => $request->title,
            'url' => $request->url,
            'description' => $request->description,
            'status' => $request->status,
            'publisher' => Auth::user()->id,
            'thumbnail' => Storage::putFileAs('thumbnail', $request->file('thumbnail'), $name)
        ];

        $artikel = Artikel::create($data);

        if($artikel){
            $request->session()->flash('success', 'Anda telah Berhasil menambah artikel!');
            return redirect('/artikel');
        }

        return redirect('/artikel/tambah');

    }
}
