<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 

class BuyController extends Controller
{
    public function index()
    {
        $sales = DB::select('select * from sells');

        return view('buy', ['sales' => $sales]);
    }
   
}
