<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\ShoppingController;
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
Route::get('/create',[ProductController::class,'create']);
Route::post('/create',[ProductController::class,'store']);
Route::get('/list',[ProductController::class,'list']);



Route::get('add',[ShoppingCartController::class,'add']);
Route::get('show',[ShoppingCartController::class,'show']);
Route::get('remove',[ShoppingCartController::class,'remove']);
Route::post('/save',[ShoppingController::class,'save']);

