<?php

namespace App\Http\Controllers;

use App\Challenge;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    public function index()
    {
        $challenge = Challenge::all();
        return view('dashboard.challenge.index', ['data' => $challenge]);
    }
    
    public function show($id)
    { 
        $challenge = Challenge::find($id);
        return view('dashboard.challenge.detail', ['challenge' => $challenge]);   
    }
    
    public function create()
    {
        $diagnosa = ['Bukan SAD', 'SAD Ringan', 'SAD Sedang', 'SAD Berat', 'SAD Sangat Berat'];
        return view('dashboard.challenge.tambah', ['level_diagnosa' => $diagnosa]);
    }


    public function store(Request $request)
    {
        $data = [
            'day' => $request->day,
            'level_diagnosa' => $request->level_diagnosa,
            'description' => $request->description,
            'content' => $request->content,
        ];
        $tambah = Challenge::create($data);
        if($tambah){
            $request->session()->flash('success', 'Anda telah Berhasil menambah Challenge!');
            return redirect('/challenge');
        }
        return redirect('/challenge/create');

    }


    public function edit($id)
    {
        $challenge = Challenge::find($id);
        $diagnosa = ['Bukan SAD', 'SAD Ringan', 'SAD Sedang', 'SAD Berat', 'SAD Sangat Berat'];
        return view('dashboard.challenge.edit', ['level_diagnosa' => $diagnosa, 'data' => $challenge]);
    }

    public function update(Request $request)
    {
        $challenge = Challenge::find($request->id);
        $challenge->day = $request->day;
        $challenge->level_diagnosa = $request->level_diagnosa;
        $challenge->content = $request->content;
        $challenge->description = $request->description;
        $challenge->save();
        if($challenge){
            $request->session()->flash('success', 'Anda telah Berhasil mengedit artikel!');
            return redirect('/challenge');
        }
        return redirect('/challenge/edit/'.$request->id);
    }


    public function destroy($id)
    {
        Challenge::find($id)->delete();
  
        return redirect('challenge');
    }
}
