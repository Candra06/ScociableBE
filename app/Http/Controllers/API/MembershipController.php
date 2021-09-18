<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MembershipController extends Controller
{
    public function store(Request $request)
    {
        $fileType = $request->file('bukti')->extension();
        $name = Str::random(8) . '.' . $fileType;
        $input['id_user'] = Auth::user()->id;
        $input['amount'] = $request->amount;
        $input['payment_status'] = 'Pending';
        $input['proof_payment'] = Storage::putFileAs('bukti', $request->file('bukti'), $name);
        $input['start_date'] = Date('Y-m-d H:i:s');
        $input['exp_date'] = Date('Y-m-d H:i:s');
        $data = Membership::create($input);
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
