<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Mail;
use Response;
use App\User;
use App\Sell;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class SellController extends Controller
{
    public function index()
    {
        return view('sell');
    }
    public function sell(Request $request)
    {
        $sell = new Sell();
        $sell->email = $request->input('email');
        $sell->amount = $request->input('amount');
        $sell->seller = Auth::user()->name;
        

        $message = "Your sell process was successful";

     
        if($sell->amount > Auth::user()->coins ){
            Session::flash('message', "Sorry you do not have sufficient coins to sell.");
            return Redirect::back(); 
        }
       
        if($sell->amount <= 0){
            Session::flash('message', "Please enter a valid amount of coin to sell.");
            return Redirect::back();
        }
        else {
            $sell->save();
            Session::flash('message', "Your sale has been published successfully.");
            return view('sell');
         } 
        
    }
}
