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

Route::get('/detect_face', function () {
    return view('detect_face');
});
Route::get('/take_photo', function () {
    return view('take_snap_shot');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





Route::get('/show_name',[App\Http\Controllers\CustomerController::class,'showName']);
Route::post('/take_snap_shot', [App\Http\Controllers\ImageController::class, 'store']);

//For image 
Route::post('upload_img',[App\Http\Controllers\FileController::class, 'upload_img']);
Route::post('show_img',[App\Http\Controllers\FileController::class, 'show_img']);


Route::post('/index_name_customer',[App\Http\Controllers\CustomerController::class,'index']);
Route::post('/res_name_cus',[App\Http\Controllers\CustomerController::class,'show_cus_name']);
Route::post('/create_customer', [App\Http\Controllers\CustomerController::class, 'store']);

Route::post('/search-chat-gpt', [App\Http\Controllers\ApiController::class, 'index']);