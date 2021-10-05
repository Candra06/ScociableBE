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

    public function list()
    {
        $user = User::all();
        return view('dashboard.user.list', ['data' => $user]);
    }
    
    public function profile()
    {
        return view('dashboard.user.index');

    }

    public function tambah()
    {
        return view('dashboard.user.tambah');
    }


    public function fetch(Request $request){
        $columns = [
            'username',
            'email',
            'role'
        ];

        $orderBy = $columns[request()->input("order.0.column")];

        $artikel = User::select('*'); 
        if(request()->input("search.value")){
            $data = $artikel->where(function($query){
                $query->whereRaw('LOWER(username) like ?',['%'.strtolower(request()->input("search.value")).'%'])
                ->orWhereRaw('LOWER(email) like ?',['%'.strtolower(request()->input("search.value")).'%'])
                ->orWhereRaw('LOWER(role) like ?',['%'.strtolower(request()->input("search.value")).'%']);
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
        dd($request->all());
    }
    public function store(Request $request){


        // dd($request->all());
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make(12345678),
            'phone' => $request->phone,
            'gender' => $request->gender,
            'role' => $request->role
        ]);

        if($user){
            $request->session()->flash('success', 'Anda telah Berhasil menambah user!');
            return redirect('/user/list');
        }
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
