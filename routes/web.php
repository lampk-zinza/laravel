<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('buy/{cookies}', function ($cookies) {
    $wallet = Auth::user()->wallet;
    Auth::user()->wallet = $wallet - $cookies * 1;
    Auth::user()->save();
    \Log::info('User ' . Auth::user()->email . ' have bought ' . $cookies . ' cookies'); // we need to log who ordered and how much

    return 'Success, you have bought ' . $cookies . ' cookies!';
});
