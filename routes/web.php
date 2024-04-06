<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TradeController;

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
    return view('checking');
});

Route::get('/test',[TradeController::class,'testEvent']);
Route::get('/private-message',[TradeController::class,'privateMessage']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/send-message', [App\Http\Controllers\HomeController::class, 'sendMessage'])->name('sendMessage');
