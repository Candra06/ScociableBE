<?php

namespace App\Http\Controllers\API;

use App\Challenge;
use App\ChallengeUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChallengeController extends Controller
{
    public function showListChallenge()
    {
        $data = ChallengeUser::leftJoin('challenge', 'challenge.id', 'user_challenge.id_challenge')
            ->where('user_challenge.id_user', Auth::user()->id)
            ->where('challenge.level_diagnosa', Auth::user()->level_diagnosa)
            ->select('user_challenge.*', 'challenge.level_diagnosa', 'challenge.day', 'challenge.content')
            ->get();

        if ($data) {
            return response()->json([
                'status' => true,
                'data' => $data,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'data' => 'Failed show challenge',
            ], 400);
        }
    }

    public function detailChallenge($id)
    {
        $data = ChallengeUser::leftJoin('challenge', 'challenge.id', 'user_challenge.id_challenge')
            ->where('user_challenge.id', $id)
            ->select('user_challenge.*', 'challenge.content', 'challenge.description')
            ->first();
        if ($data) {
            return response()->json([
                'status' => true,
                'data' => $data,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'data' => 'Failed show detail challenge',
            ], 400);
        }
    }

    public function useChallenge()
    {

        try {
            $ch = Challenge::where('level_diagnosa', Auth::user()->level_diagnosa)->get();
            foreach ($ch as $c) {
                $uc['id_user'] = Auth::user()->id;
                $uc['id_challenge'] = $c->id;
                $uc['status'] = 'pending';
                ChallengeUser::create($uc);
            }
            return response()->json([
                'status' => true,
                'data' => 'Success',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'data' => $th,
            ], 400);
        }

    }

    public function update($id)
    {
        $data = ChallengeUser::where('id', $id)->update(['status'=> 'Finish']);
        if ($data) {
            return response()->json([
                'status' => true,
                'data' => $data,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'data' => 'Failed finish challenge',
            ], 400);
        }
    }
}
