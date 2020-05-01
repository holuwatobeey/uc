<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Transfer;
use DB;
use App\Sell;
use App\User;
use Session;
use Redirect;



class AdminController extends Controller
{
    public function index()
    {
 
        $allusers = DB::select('select * from users');
        return view('allusers',['allusers' => $allusers]);

    }
    public function paid(){
        $paidusers = User::where('paid', '=', 1)->get();
        return view('paidusers',['paidusers' => $paidusers]);

    }
    public function transactions(){
        $allsales = DB::select('select * from sells');
        return view('paidusers',[ 'allsales'=> $allsales,]);

    }
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('edit')->withUser($user);
    }
    public function update(Request $request)
    {

        $id = $request->edit_id;
        //return $id;
        $user = User::find($id);
        $user->coins = $request->coins;
        $user->update();
        $paidusers = User::where('paid', '=', 1)->get();
        Session::flash('message', "User data updated successfully.");

        return Redirect::back();
    }
}
