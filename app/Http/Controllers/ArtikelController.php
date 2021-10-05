<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Diagnosa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function index(){
        $artikel = Artikel::with(['user'])->get(); 

        return view('dashboard.artikel.index', ['artikels' => $artikel]);
    }

    public function tambah(){
        return view('dashboard.artikel.tambah');

    }

    public function list()
    {
        $list = Artikel::with(['user'])->get();
        $data = Diagnosa::all();
        return view('dashboard.artikel.list', ['data' => $list]);
    }

    public function edit($id){
        $artikel = Artikel::find($id);
        return view('dashboard.artikel.edit', ['artikel' => $artikel]);
    }

    public function show($id){

        $artikel = Artikel::find($id);
        return view('dashboard.artikel.detail', ['artikel' => $artikel]);
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
    
    public function update(Request $request){
        $artikel = Artikel::find($request->id);
        $artikel->title = $request->title;
        $artikel->url = $request->url;
        $artikel->status = $request->status;
        $artikel->description = $request->description;
        if(is_null($request->file('thumbnail'))){
            $artikel->thumbnail = $request->thumbnail;
        }else{
            $fileType = $request->file('thumbnail')->extension();
            $name = Str::random(8) . '.' . $fileType;
            $artikel->thumbnail = Storage::putFileAs('thumbnail', $request->file('thumbnail'), $name);
        }
        $artikel->save();
        if($artikel){
            $request->session()->flash('success', 'Anda telah Berhasil mengedit artikel!');
            return redirect('/artikel');
        }
        return redirect('/artikel/edit/'.$request->id);

    }

    public function delete($id){
        Artikel::find($id)->delete();
        return redirect('artikel');
    }
}
