<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserMessages;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::whereDate('created_at', Carbon::today())->get();
        $user_logout = User::whereDate('last_logout', Carbon::today())->get();
        $user_messages = UserMessages::with('user')->whereDate('created_at', Carbon::today())->get()->unique('user.id');//dd($user_messages);
        $delete_messages = UserMessages::onlyTrashed()->with('user')->whereDate('deleted_at', Carbon::today())->get()->unique('user.id');//dd($delete_messages);
		// return view('user.user',compact('user'));
        return view('user.user', compact('user','user_messages','delete_messages','user_logout'));
        // return View::make('user.user', compact('user','user_messages','delete_messages'));
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
