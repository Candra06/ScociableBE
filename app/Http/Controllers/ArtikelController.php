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
        return view('dashboard.artikel.index');
    }

    public function tambah(){
        return view('dashboard.artikel.tambah');

    }

    public function edit($id){
        $artikel = Artikel::find($id);
        return view('dashboard.artikel.edit', ['artikel' => $artikel]);
    }

    public function show($id){

        $artikel = Artikel::find($id);
        return view('dashboard.artikel.detail', ['artikel' => $artikel]);
    }

    public function fetch()
    {
        $columns = [
            'id',
            'title',
            'publisher',
            'status'
        ];

        $orderBy = $columns[request()->input("order.0.column")];
        $artikel = Artikel::with(['user']); 
        if(request()->input("search.value")){
            $data = $artikel->where(function($query){
                $query->whereRaw('LOWER(title) like ?',['%'.strtolower(request()->input("search.value")).'%'])
                ->orWhereRaw('LOWER(description) like ?',['%'.strtolower(request()->input("search.value")).'%'])
                ->orWhereRaw('LOWER(status) like ?',['%'.strtolower(request()->input("search.value")).'%']);
            });
        }
        $recordsFiltered = $artikel->get()->count();
        $data = $artikel->skip(request()->input('start'))->take(request()->input('length'))->orderBy($orderBy, request()->input("order.0.dir"))->get();
        $recordsTotal = $data->count();

        return response()->json([
            'draw' => request()->input('draw'),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $artikel->get(),
            'all_request' => request()->all()
        ]);
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
  
        return response()->json([
            'message' => 'Data deleted successfully!'
          ]);
    }
}
