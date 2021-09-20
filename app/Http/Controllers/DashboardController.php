<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index() {
        return view('dashboard.index');
    }
    
    public function user()
    {
        return view('dashboard.user.index');

    }

    public function update(Request $request){
        
        $user = User::find(Auth::user()->id);
        $user->username = $request->username;
        $user->password = Hash::make($request->new_password);
        $user->phone = $request->phone;
        $user->save();
        return back();
    }
}
