<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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
//
//Route::get('/', function () {
//    return view('tasksList');
//});
Route::get('/',[TaskController::class,'index']);
Route::post('/create',[TaskController::class,'store']);
Route::get('/edit/{id}',[TaskController::class,'edit']);
Route::patch('/update/{id}',[TaskController::class,'update']);
Route::get('/delete/{id}',[TaskController::class,'destroy']);

