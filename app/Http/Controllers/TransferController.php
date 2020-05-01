<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Mail;
use Response;
use App\User;
use App\Transfer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TransferController extends Controller
{
    public function index()
    {
        return view('transfer');
    }
    public function transfer(Request $request)
    {
        $transfer = new Transfer();
        $transfer->ref_number = $request->input('ref_number');
        $transfer->amount = $request->input('amount');
        $transfer->memo = $request->input('memo');
        $transfer->sender = Auth::user()->name;
        $receiver = User::where('ref_number', '=', $transfer->ref_number)->get();
        $sender = User::find(Auth::user()->id);
        $newSenderBal = $sender->coins - $transfer->amount;
        $sender->coins = $newSenderBal;
        $newReceiverBal = $transfer->amount + $receiver[0]->coins;
        $receiver[0]->coins = $newReceiverBal;

        $message = "Your transfer process was successful";
        $check = User::where('ref_number', '=', $transfer->ref_number)->get();

        if($check->isEmpty()){
            Session::flash('message', "Sorry this reference number does not corresspond with any user, please check it and try again.");
            return Redirect::back();   
        }
        if($transfer->amount > Auth::user()->coins ){
            Session::flash('message', "Sorry you do not have sufficient coins to make this transfer.");
            return Redirect::back(); 
        }
        if($transfer->ref_number == Auth::user()->ref_number){
            Session::flash('message', "Sorry you can not transfer coins to yourself.");
            return Redirect::back();
        }
        if($transfer->amount <= 0){
            Session::flash('message', "Please enter a valid amount of coin to transfer.");
            return Redirect::back();
        }
        else {
            $sender->update();
            $receiver[0]->update();
            $transfer->save();
            Session::flash('message', "Your transfer process was sucessful.");
            return view('transfer');
         } 
        
    }


}
