<?php

namespace App\Http\Controllers;
use Auth;
use App\Sell;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $sales = Sell::where('email', '=', Auth::user()->email)->first();


        return view('shop', ['sales' => $sales]);
    }
}
