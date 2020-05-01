<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Transfer;
use DB;
use App\Sell;
use App\User;

class HomeController extends Controller
{
    public function index()
    {
        $transfer = Transfer::where('sender', '=', Auth::user()->name)->get();
        $alltransfer = DB::select('select * from transfers');
        $users = DB::select('select * from users');
        $paidusers = User::where('paid', '=', 1)->get();
        $allsales = DB::select('select * from sells');
        $sell = Sell::where('seller', '=', Auth::user()->name)->get();
        return view('home',['transfer' => $transfer, 'alltransfer'=> $alltransfer, 'allsales'=> $allsales, 'sell' => $sell]);

    }
}
