<?php

namespace App\Http\Controllers\API;

use App\Diagnosa;
use App\DiagnosaUser;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiagnosaController extends Controller
{
    public function show()
    {
        $data = Diagnosa::all();
        if ($data) {
            return response()->json([
                'status' => true,
                'data' => $data,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'data' => 'Failed show diagnosa',
            ], 400);
        }
    }

    public function diagnosaUser(Request $request)
    {
        $question = explode(",", $request->question);
        $point = explode(",", $request->poin);
        // return count($point);

        $poin = 0;
        $data = '';
        $level='';
        for ($i = 0; $i < count($question); $i++) {
            $input['id_user'] = Auth::user()->id;
            $input['id_question'] = $question[$i];
            $input['poin'] = $point[$i];
            DiagnosaUser::create($input);
            $poin += $point[$i];
        }
        // return $poin;
        if ($poin <= 20) {

            $data = User::where('id', Auth::user()->id)->update(['level_diagnosa' => 'Bukan SAD']);
            $level = 'Bukan SAD';
        } elseif ($poin <= 30) {
            $data = User::where('id', Auth::user()->id)->update(['level_diagnosa' => 'SAD Ringan']);
            $level = 'SAD Ringan';
        } else  if ($poin <= 40) {
            $data = User::where('id', Auth::user()->id)->update(['level_diagnosa' => 'SAD Sedang']);
            $level = 'SAD Sedang';
        } else if ($poin <= 50) {
            $data = User::where('id', Auth::user()->id)->update(['level_diagnosa' => 'SAD Berat']);
            $level = 'SAD Berat';
        } else  if ($poin > 50) {
            $data = User::where('id', Auth::user()->id)->update(['level_diagnosa' => 'SAD Sangat Berat']);
            $level = 'SAD Sangat Berat';
        }


        if ($data) {
            return response()->json([
                'status' => true,
                'poin' => $poin,
                'data' => $level,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'data' => 'Failed to answer question',
            ], 400);
        }
    }
}
