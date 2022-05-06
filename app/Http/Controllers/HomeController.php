<?php

namespace App\Http\Controllers;

use App\Models\UserMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Auth::id();
        $user = UserMessages::where('user_id', '=', $user_id)->get();
        // $user = UserMessages::all();
        // dd($user);
        return view('home',compact('user'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::id();
    
     $request->validate([
         'txt_message' => 'required',
     ]);

        $users =New UserMessages();
        $users->user_id= $user_id;
        $users->message= $request->txt_message;
        $users->save();
     Session::flash('succes_message','Message added Successfully');

        return redirect('/');

    }
    // To update an existing user (load to edit)
    public function edit($id)
    {
        $user_edit = UserMessages::find($id);//dd($user_edit);
        // Load user/createOrUpdate.blade.php view
        return view('home',compact('user_edit'));
        // return View::make('home')->with('user_edit', $user_edit);
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
        $request->validate([
            'txt_message' => 'required',
        ]);
        $result_data    =  UserMessages::where('id', $id)
                            ->update(
                            [
                                'message'          => $request->txt_message, 
                            ]
                    );
        // $message = 'Message has been sent successfully.';
        // return Redirect::route('/')->withMessage($message);
        Session::flash('succes_message','Message updated Successfully');

        return redirect('/');
    }
    public function destroy($id) {

        $delete = UserMessages::find($id);
        // $delete->softDeletes();
        $delete->delete();
    
        return redirect('/');
    
    }
}
