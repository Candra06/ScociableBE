<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\KonsultasiDetail;
use App\KonsultasiRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KonsultasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $role = Auth::user()->role;
            $data = [];
            // return $role;
            if ($role == 'Psikolog') {
                $room = KonsultasiRoom::where('psikolog', Auth::user()->id)->get();
                $dat = [];
                foreach ($room as $key) {
                    $dat[] = KonsultasiDetail::leftJoin('konsultasi_room', 'konsultasi_room.id', 'konsultasi_detail.id_room')
                        ->leftJoin('users', 'users.id', 'konsultasi_room.user')
                        ->where('konsultasi_detail.id_room', $key->id)
                        ->select('users.username', 'users.id', 'konsultasi_detail.*')
                        ->orderBy('konsultasi_detail.created_at', 'DESC')->first();
                }
                $tmp = [];

                foreach ($dat as $key) {
                    $tmp['message'] = $key->message;
                    $tmp['username'] = $key->username;
                    $tmp['receiver'] = $key->id;
                    $tmp['id_room'] = $key->id_room;
                    $tmp['created_at'] = $key->created_at;
                    $data[] = $tmp;
                }
            } else {
                $room = KonsultasiRoom::where('user', Auth::user()->id)->get();
                $dat = [];

                foreach ($room as $key) {
                    $dat[] = KonsultasiDetail::leftJoin('konsultasi_room', 'konsultasi_room.id', 'konsultasi_detail.id_room')
                        ->leftJoin('users', 'users.id', 'konsultasi_room.psikolog')
                        ->where('konsultasi_detail.id_room', $key->id)
                        ->select('users.username', 'users.id', 'konsultasi_detail.*')
                        ->orderBy('konsultasi_detail.created_at', 'DESC')->first();
                }
                $tmp = [];
                // return $dat;
                foreach ($dat as $key) {
                    $tmp['message'] = $key->message;
                    $tmp['username'] = $key->username;
                    $tmp['receiver'] = $key->id;
                    $tmp['id_room'] = $key->id_room;
                    $tmp['created_at'] = $key->created_at;
                    $data[] = $tmp;
                }
                // return $tmp;

            }
            return response()->json([
                'status' => true,
                'data' => $data,

            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th,

            ], 400);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'sender' => 'required',
            'receiver' => 'required',
            'message' => 'required',
        ]);
        // return $request;
        $data = '';
        $cek = KonsultasiRoom::where('user', $request->sender)->orWhere('psikolog', $request->receiver)->first();
        // return $cek;
        if ($cek) {

            $detail['id_room'] = $cek->id;
            $detail['sender'] = $request->sender;
            $detail['receiver'] = $request->receiver;
            $detail['message'] = $request->message;
            $data = KonsultasiDetail::create($detail);
        } else {
            // return $request;
            $room['user'] = $request->sender;
            $room['psikolog'] = $request->receiver;
            $room['kategori'] = $request->kategori;
            $send = KonsultasiRoom::create($room);
            $detail['id_konsultasi'] = $send->id;
            $detail['sender'] = $request->sender;
            $detail['receiver'] = $request->receiver;
            $detail['message'] = $request->message;
            $detail['status'] = 'Diterima';
            $data = KonsultasiDetail::create($detail);
        }
        if ($data) {
            return response()->json([
                'status' => true,
                'data' => $data,

            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'data' => 'Failed create chat',

            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = KonsultasiDetail::where('id_room', $id)->first();
        if ($data) {
            return response()->json([
                'status' => true,
                'data' => $data,

            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'data' => 'Failed show chat',

            ], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
