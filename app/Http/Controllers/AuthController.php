<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'fullname' => 'required|max:255',
            'username' => 'required|unique:users|min:2',
            'email' => 'required|email:dns',
            'password' => 'required|min:6',
            'tgllahir' => 'required',
            'gender' => 'required'
        ]);


        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->nomor,
            'gender' => $request->gender,
            'birth_date' => $request->tgllahir,
            'role' => 'Admin'
        ]);

        $request->session()->flash('success', 'Anda telah Berhasil membuat akun!');

        return redirect('/login');
    }

    public function authenticate(Request $request){

        $validate = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => 'required'
        ]);
        
        $credential = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        
        if(Auth::attempt($credential)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        $user = User::where('email', $request->email)->first();


        if(!is_null($user)){
            if(!Hash::check($credential['password'], $user->password)){
                return back()->with('loginError', 'Password yang anda masukan salah...');
            }
        }
        



        return back()->with('loginError', 'Username yang anda masukan salah...');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }



}
