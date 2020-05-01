<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

use App\User;
use App\Sell;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('allusers', 'AdminController@index')->name('allusers');
Route::get('paidusers', 'AdminController@paid')->name('paidusers');
Route::get('transactions', 'AdminController@transactions')->name('transactions');
Route::get('shop', 'ShopController@index')->name('shop');
Route::get('transfer', 'TransferController@index')->name('transfer');
Route::get('buy', 'BuyController@index')->name('buy');
Route::get('sell', 'SellController@index')->name('sell');
Route::post('transfer', 'TransferController@transfer');
Route::post('sell', 'SellController@sell');
Route::get('edit/{id}','AdminController@show');
Route::post('edit/{id}','AdminController@update');
Route::any('/search',function(){
    $q = \Request::input ( 'q' );
    $result = Sell::where('amount','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->get();
    if(count($result) > 0)
        return view('buy')->withDetails($result)->withQuery ( $q );
    else return view ('buy')->withMessage('No Details found. Try to search again !');
});

Route::get('payment', 'PaypalController@index');
Route::post('charge', 'PaypalController@charge');
Route::get('paymentsuccess', 'PaypalController@payment_success');
Route::get('paymenterror', 'PaypalController@payment_error');

// Route::get('make-payment', 'SkrillPaymentController@makePayment');
// Route::post('ipn', 'SkrillPaymentController@ipn');
