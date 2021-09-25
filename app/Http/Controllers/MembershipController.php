<?php

namespace App\Http\Controllers;

use App\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        $members = Membership::all();
        return view('dashboard.membership.index', ['members' => $members]);
    }


    public function fetch(){
        $columns = [
            'id',
            'amount',
            'payment_status',
            'proof_payment'
        ];

        $orderBy = $columns[request()->input("order.0.column")];
        $member = Membership::with(['user']); 
        if(request()->input("search.value")){
            $data = $member->join('users', 'users.id', '=', 'membership.id_user')->where(function($query){
                $query->whereRaw('LOWER(users.username) like ?',['%'.strtolower(request()->input("search.value")).'%'])
                ->orWhereRaw('LOWER(amount) like ?',['%'.strtolower(request()->input("search.value")).'%'])
                ->orWhereRaw('LOWER(payment_status) like ?',['%'.strtolower(request()->input("search.value")).'%']);
            });
        }
        $recordsFiltered = $member->get()->count();
        $data = $member->skip(request()->input('start'))->take(request()->input('length'))->orderBy($orderBy, request()->input("order.0.dir"))->get();
        $recordsTotal = $data->count();

        return response()->json([
            'draw' => request()->input('draw'),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $member->get(),
            'all_request' => request()->all()
        ]);
    
    }

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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


    public function update(Request $request)
    {
        $member = Membership::find($request->id);
        $member->payment_status = $request->type;
        $member->save();

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
