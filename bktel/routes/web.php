<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/detect_face', function () {
    return view('detect_face');
});
Route::get('/take_photo', function () {
    return view('take_snap_shot');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Customer Controller 
Route::post('/submit_customer', [App\Http\Controllers\CustomerController::class, 'store']);

Route::post('/take_snap_shot', [App\Http\Controllers\ImageController::class, 'store']);