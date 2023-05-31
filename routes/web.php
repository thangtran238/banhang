<?php

use App\Http\Controllers\AddRoomController;
use App\Http\Controllers\APICovidController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/add', [AddRoomController::class, 'index']);
Route::post('/add', [AddRoomController::class, 'store'])->name('add.store');



Route::get('/signup',[RegisterController::class,'showRegistrationForm']);
Route::post('/signup',[RegisterController::class,'RegisterAction']);


Route::get('/', function () {
    return view('welcome');
});


Route::get('/tong',[App\Http\Controllers\CongController::class,'tinhtong']);
Route::post('/tong',[App\Http\Controllers\CongController::class,'tinhtong']);

Route::get('/area',[App\Http\Controllers\AreaofshapeController::class,'computeArea']);
Route::post('/area',[App\Http\Controllers\AreaofshapeController::class,'computeArea']);


Route::get('/master', [MasterController::class,'getDetail']);
