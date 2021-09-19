<?php

namespace App\Http\Controllers\API;

use App\Forum;
use App\ForumReply;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Forum::all();
        if ($data) {
            return response()->json([
                'status' => true,
                'data' => $data,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'data' => 'Failed show forum',
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
        $input['created_by'] = Auth::user()->id;
        $input['topic'] = $request->topic;
        $input['content'] = $request->content;
        $input['anonim'] = $request->anonim;
        $input['likes'] = 0;
        $data = Forum::create($input);
        if ($data) {
            return response()->json([
                'status' => true,
                'data' => $data,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'data' => 'Failed create forum',
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
        $data = Forum::where('id', $id)->first();
        $reply = ForumReply::where('id_reff', $id)->get();
        if ($data) {
            return response()->json([
                'status' => true,
                'data' => $data,
                'reply' => $reply,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'data' => 'Failed show artikel',
            ], 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reply(Request $request, $id)
    {

        $input['created_by'] = Auth::user()->id;
        $input['id_reff'] = $id;
        $input['content'] = $request->content;
        $input['likes'] = 0;
        $data = ForumReply::create($input);
        if ($data) {
            return response()->json([
                'status' => true,
                'data' => $data,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'data' => 'Failed create forum',
            ], 400);
        }
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
    public function likes($id)
    {
        $dt = Forum::where('id', $id)->first();
        $tmp = $dt->likes + 1;
        $data = Forum::where('id', $id)->update(['likes' => $tmp]);
        if ($data) {
            return response()->json([
                'status' => true,
                'data' => $data,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'data' => 'Failed likes forum',
            ], 400);
        }
    }

    public function likesReply($id)
    {
        $dt = ForumReply::where('id', $id)->first();
        $tmp = $dt->likes + 1;
        $data = ForumReply::where('id', $id)->update(['likes' => $tmp]);
        if ($data) {
            return response()->json([
                'status' => true,
                'data' => $data,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'data' => 'Failed likes reply',
            ], 400);
        }
    }

    public function unlikes($id)
    {
        $dt = Forum::where('id', $id)->first();
        $tmp = $dt->likes - 1;
        $data = Forum::where('id', $id)->update(['likes' => $tmp]);
        if ($data) {
            return response()->json([
                'status' => true,
                'data' => $data,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'data' => 'Failed likes forum',
            ], 400);
        }
    }

    public function unlikesReply($id)
    {
        $dt = ForumReply::where('id', $id)->first();
        $tmp = $dt->likes - 1;
        $data = ForumReply::where('id', $id)->update(['likes' => $tmp]);
        if ($data) {
            return response()->json([
                'status' => true,
                'data' => $data,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'data' => 'Failed likes reply',
            ], 400);
        }
    }
}
