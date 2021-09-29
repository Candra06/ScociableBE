<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Membership;
use App\User;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

class UserController extends Controller
{
    public $successStatus = 200;

    public function signup(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
            'birth_date' => 'required',
            'gender' => 'required',
            'phone' => 'required'
        ]);
        // return $request;
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'role' => 'User',
            'password' => bcrypt($request->password)
        ]);
        if ($user) {
            return response()->json([
                'status' => true,
                'message' => 'Successfully created user!'
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Failed created user!'
            ], 401);
        }
    }

    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        // dd($password);
        // return bcrypt($password);
        // return $request;
        $data = User::where('username', $username)->first();
        if ($data) {
            if (password_verify($password, $data->password)) {
                $membership = Membership::where('id_user', $data->id)
                ->where('payment_status', 'Confirm')
                ->where('exp_date', '>', Carbon::now())
                ->orderBy('created_at', 'DESC')
                ->first();
                if ($membership) {
                    $success['membership'] = true;
                }else{
                    $success['membership'] = false;
                }

                $success['id'] = $data->id;
                $success['username'] = $data->username;
                $success['email'] = $data->email;
                $success['phone'] = $data->phone;
                $success['role'] = $data->role;
                $success['birth_date'] = $data->birth_date;
                $success['level_diagnosa'] = $data->level_diagnosa;
                $success['gender'] = $data->gender;
                $success['token'] =  $data->createToken('nApp')->accessToken;
                return response()->json(['status' => true, 'data' => $success], 200);
            } else {
                return response()->json(['status' => false, 'error' => bcrypt($password)], 401);
            }
        } else {
            return response()->json(['status' => false, 'error' => 'Username Salah'], 401);
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'email' => 'required|string',
            'birth_date' => 'required',
            'gender' => 'required',
            'phone' => 'required'
        ]);
        // return $request;
        $update['username'] = $request->username;
        $update['phone'] = $request->phone;
        $update['birth_date'] = $request->birth_date;
        $update['email'] = $request->email;
        $update['gender'] = $request->gender;
        if ($request->password) {
            $update['password'] = bcrypt($request->password);
        }
        $user = User::where('id', Auth::user()->id)->update($update);
        if ($user) {
            return response()->json([
                'status' => true,
                'message' => 'Successfully updated user!'
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Failed updated user!'
            ], 401);
        }
    }


    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function listPsikolog()
    {
        $data = User::where('role', 'Psikolog')->get();
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

    public function getMembership()
    {
        $membership = Membership::where('id_user', Auth::user()->id)
        ->where('payment_status', 'Confirm')
        ->where('exp_date', '>', Carbon::now())
        ->orderBy('created_at', 'DESC')
        ->first();
        if ($membership) {
            return response()->json([
                'status' => true,
                'message' => 'Successfully updated user!',
                'data' => $membership,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Failed updated user!'
            ], 401);
        }
    }


}
